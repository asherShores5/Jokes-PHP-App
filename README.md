# Jokes Application

A web-based application for creating and storing jokes, built with HTML, PHP, MySQL, and jQuery.

![image](https://github.com/asherShores5/Jokes-PHP-App/assets/71547146/1ab07b58-c5de-467f-ad53-b3f7d5ce344a)


## Instructions to Use the Link to Start the Service and Access the EC2 Instance
1. Start the EC2 Instance:
- Open your web browser and navigate to the following URL: [Start EC2 Instance](https://h2kueaswak.execute-api.us-east-1.amazonaws.com/prod/start-jokes-app).
- This will trigger the Lambda function to start the EC2 instance.

2. Retrieve the Public IP Address:
- The response from the above URL will contain a JSON object.
- Look for the key body in the JSON response. It will contain a message similar to: EC2 instance started and will stop after 10 minutes. Public IP: <your_public_ip>.
- Note the <your_public_ip> provided in the response.

3. Visit the Website:
- Open a new tab in your web browser.
- Enter the public IP address noted in the previous step in the address bar.
- Press Enter to visit the website hosted on your EC2 instance.
- Must use http NOT https

Example Response and Usage
- Example JSON Response:
   ```json
      {
          "statusCode": 200,
          "body": "EC2 instance started and will stop after 10 minutes. Public IP: 54.123.45.67"
      }
   ```
- Example Public IP Address:
   - In this example, the public IP is 54.123.45.67.
   - To visit the website, you would enter http://54.123.45.67 in your web browser’s address bar.
- Errors:
   - You may see an error that says: "The instance 'i-09798536a5d851b41' is not in a state from which it can be started."
      - If this is the case, simply wait 30 seconds and try again, this is caused by trying to start the instance while in a "shutting down" state
   - You may otherwise see and error that says: "Public IP: No public IP assigned yet, please wait 10 seconds and refresh this page (can take up to a minute to load IP)"
      - Simply follow the instructions and wait adn continue to refresh the page until the IP is served.

Follow these steps each time you need to start the EC2 instance and access your website. The instance will automatically stop after 10 minutes.

## Features
- Joke creation and database storage
- Joke keyword search
- User login and registration
- Web verification (in progress)
- MySQL database integration

## Information/Data Security
This application implements the following security measures to protect user data:
- SQL prepared statements to prevent SQL injection attacks
- Password hashing for secure password storage
- User registration with regex

## Requirements
- For local hosting: MAMP or a similar web development environment
- For cloud hosting: AWS EC2 instance with LAMP stack
- Basic understanding of HTML, PHP, and MySQL

## Installation

### AWS Hosting
1. **Launch an EC2 Instance**:
   - Launch a new EC2 instance with an Amazon Linux 2 AMI.
   - Install Apache, PHP, and MySQL on the instance.

2. **Clone the Repository**:
   ```bash
   git clone https://github.com/asherShores5/Jokes-PHP-App.git /var/www/html
   ```
   
3. Import the Database:
- Connect to your MySQL server and create a database.
- Import the create_db.sql file to your MySQL database:
  ```bash
  mysql -u yourusername -p yourpassword jokes_database < /var/www/html/Jokes-PHP-App/create_db.sql
  ```
  
4. Update the Database Configuration:
- Update db_connect.php with your MySQL credentials:
- Alternatively you can use the existing create_db.sql and db_connect.php if you want to use the same setup.
  ```php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'jokes_database');
  define('DB_PORT', 3306);
  ```
  
5. Set File Permissions:

- Ensure the web server has the necessary permissions to access the files:
  ```bash
  sudo chown -R apache:apache /var/www/html/Jokes-PHP-App
  ```

6. Access the Application:
- Open your web browser and navigate to your EC2 instance's public DNS.

### Local Hosting with MAMP
1. Clone or Download the Repository:
- Place the repository in your MAMP htdocs directory:
  ```bash
  git clone https://github.com/asherShores5/Jokes-PHP-App.git /Applications/MAMP/htdocs/Jokes-PHP-App
  ```
  
2. Import the Database:- 
Open phpMyAdmin or use the MySQL command line to create a new database and import the create_db.sql file:
  ```bash
  mysql -u root -p jokes_database < /Applications/MAMP/htdocs/Jokes-PHP-App/create_db.sql
  ```

3. Update the Database Configuration:
- Update db_connect.php with your MySQL credentials:
  ```php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'jokes_database');
  define('DB_PORT', 3306);
  ```

Start MAMP Servers:
- Start Apache and MySQL servers from the MAMP control panel.

5. Access the Application:
- Open your web browser and navigate to http://localhost:8888/Jokes-PHP-App.

## Usage
- Register for an account to start creating and storing jokes.
- Search for jokes by keyword or browse all jokes in the database.
- Edit or delete your own jokes at any time.

## Contributing
Feel free to fork the repository and submit a pull request with any improvements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for details.
