Expense Management Practical Step:

1. Do the migration of files.
     -> php artisan migrate
2. Run the below command of seeder for auto adding data of user & expense into the database.
    -> php artisan db:seed
3. Fetch the email from table and Password would be "123456".
4. For Forgot Password add the email & password in .env file for getting emails.
5. I have listed all the user list expenses and user will only able to update its own expenses/incomes. 
