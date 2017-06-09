<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usher;
use App\Service;
use App\Team;
use Session;

class UsherSchedulerController extends Controller
{
    /**
    * GET
    * /
    *
    * this will display all services
    */
    public function showServices() {
        # get the logged on user
        $user = Auth::user();
        if(!$user) {
            $user = null;
        }
        $services = Service::orderBy('date')->get();
        $teams = Team::all();

        return view ('ushers.services')->with([
            'services' => $services,
            'teams' => $teams,
            'user' => $user,
        ]);
    }

    /**
    * GET
    * /service/new
    *
    * This will prompt the user for information to create new service.
    * A default date will be provided in the form. This date will be
    * derived from adding 7 days to the last service date from the database.
    */
    public function newService(Request $request) {
        # get the logged on user
        $user = Auth::user();
        if(!$user) {
            $user = null;
        }

        # get the date of the last service
        # $lastServiceDate = Service::orderBy('date', 'desc')->first();
        $lastService = Service::orderBy('date', 'desc')->first();
        $lastServiceDate = $lastService->date;

        if($lastServiceDate) {
            # add seven days for the default input for the new service date
            $newServiceDate = date_create($lastServiceDate);
            date_add($newServiceDate,date_interval_create_from_date_string('7 days'));
        } else {
            $newServiceDate = null;
        }

        # get the team assigned to the last service
        $lastTeam = $lastService->team_id;
        if($lastTeam) {
            # cyle to the next team and provide it to the view as the default
            if($lastTeam == 1 || $lastTeam == 2 || $lastTeam == 3 || $lastTeam == 4 || $lastTeam == 5 ) {
                $nextTeam = $lastTeam + 1;
            } else {
                # then it is 6, so make it 1
                $nextTeam = 1;
            }
        }

        return view('ushers.newService')->with([
            'newServiceDate' => $newServiceDate,
            'nextTeam' => $nextTeam,
            'user' => $user,
        ]);
    }

    /**
    * POST
    * /service/new
    *
    * this will save the new usher in the databas
    */
    public function saveService(Request $request) {

        if (isset($_POST['save_button'])) {
            $this->validate($request, [
                'date' => 'required|date',
                'time' => 'required',
                'team' => 'required',
            ]);

            # update record in the database
            $service = new Service();
            $service->date = $request->date;
            $service->time = $request->time;
            $service->name = $request->name;
            $service->team_id = $request->team;
            $service->save();

            Session::flash('good_msg', 'The service was added.');
        } else { # the user clicked the cancel button
            return redirect('/');
        }
        return redirect('/');
    }

    /**
    * GET
    * /service/edit/{id}
    */
    public function serviceEdit($id) {
        # get the logged on user
        $user = Auth::user();
        if(!$user) {
            $user = null;
        }

        $service = Service::find($id);

        if(is_null($service)) {
            Session::flash('warning_msg', 'That particular service was not found.');
            return redirect('/');
        }

        return view('ushers.editService')->with([
            'id' => $id,
            'service' => $service,
            'user' => $user,
        ]);
    }

    /**
    * POST
    * /service/edit
    */
    public function edit_or_delete_Service(Request $request) {

        if (isset($_POST['delete_button'])) {
            # delete action
            $service = Service::find($request->id);

            # only delete if the $service is not null
            if($service) {
                $service->delete();
                Session::flash('good_msg', 'The service was removed');
            } else {
                Session::flash('warning_msg', 'That particular service was not found.');
            }

        } else if (isset($_POST['update_button'])) {
            # update action
            $this->validate($request, [
                'date' => 'required|date',
                'time' => 'required',
                'team' => 'required',
            ]);

            $service = Service::find($request->id);

            # only update if the $service is not null
            if($service) {
                # update record in the database
                $service->date = $request->date;
                $service->time = $request->time;
                $service->name = $request->name;
                $service->team_id = $request->team;
                $service->save();

                Session::flash('good_msg', 'The service details were updated.');
            }
        } else { # the user clicked the cancel button
            return redirect('/');
        }
        return redirect('/');
    }


    /**
    * GET
    * /teams
    *
    * this will display all teams
    */
    public function showTeams() {
        # get the logged on user
        $user = Auth::user();
        if(!$user) {
            $user = null;
        }

        $teams = Team::with('ushers')->get();

        return view ('ushers.teams')->with([
            'teams' => $teams,
            'user' => $user,
        ]);
    }

    /**
    * GET
    * /ushers/edit/{id}
    */
    public function usherEdit($id) {
        # get the logged on user
        $user = Auth::user();
        if(!$user) {
            $user = null;
        }

        $usher = Usher::with('teams')->find($id);

        if(is_null($usher)) {
            Session::flash('message', 'That particular usher was not found.');
            return redirect('/teams');
        }

        $teamsForCheckboxes = team::getTeamsForCheckboxes();

        # Create a simple array of just the team names for teams associated with this usher;
        # will be used in the view to decide which teams should be checked off
        $teamsForThisUsher = [];
        foreach($usher->teams as $team) {
            $teamsForThisUsher[] = $team->team_name;
        }

        return view('ushers.editUsher')->with([
            'id' => $id,
            'usher' => $usher,
            'teamsForCheckboxes' => $teamsForCheckboxes,
            'teamsForThisUsher' => $teamsForThisUsher,
            'user' => $user,
        ]);
    }

    /**
    * POST
    * /ushers/edit
    */
    public function edit_or_delete_Usher(Request $request) {

        if (isset($_POST['delete_button'])) {
            # delete action
            $usher = Usher::find($request->id);

            # only delte if the $usher is not null
            if($usher) {
                $usher->teams()->detach();
                $usher->delete();
                Session::flash('good_msg', $usher->first_name.' '.$usher->last_name.' was removed from the usher list.');
            } else {
                Session::flash('warning_msg', 'That particular usher was not found.');
            }

        } else if (isset($_POST['update_button'])) {
            # update action
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
            ]);

            $usher = Usher::find($request->id);

            # only update if the $usher is not null
            if($usher) {
                # update user record in the database
                $usher->first_name = $request->first_name;
                $usher->last_name = $request->last_name;
                if($request->capitan == 'on') {
                    $usher->capitan = 1;
                } else {
                    $usher->capitan = 0;
                }
                $usher->email = $request->email;

                # If there were teams selected...
                if($request->teams) {
                    $teams = $request->teams;

                }
                # If there were no teams selected then
                # default to placing the usher in the
                # unassigned group
                else {
                    $teams = 6;
                }

                # Sync teams
                $usher->teams()->sync($teams);
                $usher->save();

                Session::flash('good_msg', $usher->first_name.' '.$usher->last_name.'\'s details were updated.');
            }
        } else { # the user clicked the cancel button
            return redirect('/teams');
        }
        return redirect('/teams');
    }

    /**
    * GET
    * /usher/new
    *
    * this will prompt the user for information to create new usher
    */
    public function newUsher(Request $request) {
        # get the logged on user
        $user = Auth::user();
        if(!$user) {
            $user = null;
        }

        $teamsForCheckboxes = team::getTeamsForCheckboxes();

        return view('ushers.newUsher')->with([
            'teamsForCheckboxes' => $teamsForCheckboxes,
            'user' => $user,
        ]);
    }

    /**
    * POST
    * /usher/new
    *
    * this will save the new usher in the database
    */
    public function saveUsher(Request $request) {

        if (isset($_POST['save_button'])) {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
            ]);

            # create user record in the database
            $usher = new Usher();

            $usher->first_name = $request->first_name;
            $usher->last_name = $request->last_name;
            if($request->capitan == 'on') {
                $usher->capitan = 1;
            } else {
                $usher->capitan = 0;
            }
            $usher->email = $request->email;

            # If there were teams selected...
            if($request->teams) {
                $teams = $request->teams;
            }
            # If there were no teams selected then
            # default to placing the usher in the
            # unassigned group
            else {
                $teams = 6;
            }

            # Sync teams
            $usher->save();
            $usher->teams()->sync($teams);

            Session::flash('good_msg', $usher->first_name.' '.$usher->last_name.' was added to the usher list.');
        } else { # the user clicked the cancel button
            return redirect('/teams');
        }
        return redirect('/teams');
    }

}
