Usher Scheduler application

This web-based application allows for a schedule administrator to assign
usher teams to upcoming worship services. This will be a production application
used specifically for the Church of the Messiah in Gwynedd, PA, where I am the
coordinator of the usher teams.

If you visit the site as a guest, you will be provided with a list of upcoming
worship services showing the usher teams assigned to staff each service. While
the database may contain many services, only those that are greater or equal
to the current date are displayed.

As a guest, that is where your visibility and functionality stops.

If you log in to the application (this version of the application is strictly
using the jill@harvard.edu and jamal@harvard.edu with the password provided in
the course notes), you will have much more functionality:

    - the ability to edit upcoming worship services
    - the ability to create new worship services and assign usher teams
    - the ability to view and manage usher teams
    - the ability to create new ushers and assign them to a team or teams

There are several database tables used in this application:

    - Services - contains all the worship services that have been created. This
      table has a 1 many relationship with the teams table.
    - Teams - contains the ushering teams. This table has a many to one
      relationship with the services table and a many to many relationship with
      the ushers table.
    - Ushers - contains the list of all ushers with their names and email
      addresses. This table has a many to many relationship with the teams
      table.
    - Users - contains the user accounts allowed to log in to this application.

Functionality that I would like to add:

    - Continue to enhance the login functionality, allowing preapproved users
      the ability to login, change their passwords, reset their passwords, etc.
    - Create a scheduled job that runs each week to send an email reminder to
      those ushers scheduled to staff the next weekend's worship service, acting
      as a reminder.
    - Update the view where upcoming worship services are displayed. I would
      like to break up the table by month.
    - Add a calendar date-picker to the new service form.
    - Add a process whereby the database is backed up.
    - Add "confirm deletion" functionality for ushers and worship services
    - and more...
