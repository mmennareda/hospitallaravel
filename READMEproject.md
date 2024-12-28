# Smart Hospitals (Hospital Management System)
This is a hospital managemnt system written in php(Laravel)

## This has the following features
* Patient Management
    * Patinet Registration (IN/OUT)
    * Search Patient
    * Edit Pateint Details
    * Book Appointments

* User Role Based Access Control
    * Admin
    * Doctor
    * Patient

 
# Installation Guide
    1)Install Composer In Your PC
    
    2)Clone Or Download The Repository
    
    3)Goto The Repository and Open a Terminal Enter Following Commands 
        composer install
    
    4)Add the .env File(You Can Find It In The Internet)
    
    5)Set the .env File with the relevant configuration
    
    6)Execute the Following Command
        php artisan generate:key
        php artisan migrate
        php artisan serve
        php artisan db:hospital
    

# Note

Every Time You Make A Change To The Database Do The Change In The Migrations(Not Directly To The Real Database)


