# MYSQL-Notes

MYSQL todo list app:

Create form
- Make the form method set to post

Connect to database
- Use PDO method which can be excepted across all database servers

Create a file to store all the files with OOP
- Require this file once in all our external php files

Output data to users from database 
- Loop though notes in the index.php
- Connect to database use prepare and execute method 
    - Return this data as an associative array so that we can loop though all notes

To create new notes
- Lets create a method to be called when new note button is clicked
- We will collect data from the index.php $_POST and send it to the database
    - Lets create a new file ‘create.php’ to collect the data and execute 
    - We need to insert values into the database and the binding function will help with this
-create.php
    - Require connection.php 
    - Call connection 
    - Redirect back to index.php
- When this function is called a new note will be created

To update notes
- when the title is clicked we want to prefill the form with this data
- Let’s give each form an individual id and send that to the server
    - Inside the form lets give name=“id”
- Lets create a function to call notes by id when the title is clicked
    - Inside connection.php we create a method
    - The method prepares and executes a statement to select a query where the id’s are equal in the database
    - The method then returns an associated array for us to loop though
- Let’s make sure that we can fill the data if there is an id.
- Lets create an if statement inside index.php to check if exists $_GET[‘id’]
- If there is we should populate the form
- to prevent errors lets always make the forms hold empty values by creating a variable that has empty strings for us to loop through and that has an empty [id]
- In create.php we set id equal to an empty string if their is no id to be pulled from the post
    - If there is no string then the submit button will create a note, if there is an id then when the button is clicked we will call the update note function
- Let’s echo the $current notes id , title, and description inside the form at all times. Remember currentNote has empty string values
- Now our form is always filled with data. So when the if statement is ran there isn’t an error outputted in the html but instead an empty string that is caught in the conditional statement

Lets change the notes button 
- conditional if there is a new note or we are updating the note
- Inside our index.php lets create a conditional for the button name to see if there is current id set or not.
  - If not then lets keep ‘New Note’; when there is, we will output ‘Update Note’

Let handle deleting a note
- If the ‘x’ button is clicked lets call a function
- Lets create a function inside connection called removeNote
- We are going to prepare a statement to delete from the data base this id value.
- We used binding to pull the values from the server and send that to the database
- Lets also send the data to the server by using a form inside our index.php and making this a hidden input. 
  We are clicking the x button and sending a value of the note id to server and then pulling that 
  information and linking it to bind values in our prepare statement
- delete.php
  - Require connection.php file
  - Call connection file and send the value of the $_POST[‘id’]
  - Redirect back to index.php

