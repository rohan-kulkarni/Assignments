Socket Programming.

Connection:-
-----------------------------------------------------------------
1. Connection will include Details of host and port details where the server will run and create a socket on.
include this file with the server.php and client.php

Server Side:-
-----------------------------------------------------------------
1. Server side has a function to encrypt input from Client side using key provided and return encrypted message.
2. Run this file first to create a new socket connection using details of host and port from connection.php.
3.It will listen to the socket connection.
4.When input from client is recieved it will accept connection.
5.It will read the clients input through the socket.
6.The encrypt fuction will be called and the encrypted text will be returned.
7.The encrypted message will be wirtten through socket and sent back to client through the socket connection.

Client side:-
-----------------------------------------------------------------
1. It will check and validate the input given by the user through the UI.
2. It will create a new socket connection using details of host and port from connection.php.
3.It will connect to the socket connection created by server.
4.It will write to the socket the message to be encrypted and the key for encryption.
5.It will read the servers response through the socket.
6.The encrypted message recieved through server will be shown to the user.

Instructions to test the program:-
-----------------------------------------------------------------
1. Place the EncryptMessage.html,client.php,server.php and connection.php in the /var/www/html folder or the default localhost directory.
2. Navigate to server.php through url in browser.
3. In a new tab Navigate to EncryptMessage.html for the UI.
4. Fill in the necessary fields.
5. click on submit.
6. The result of encryption will be displayed on the screen.
