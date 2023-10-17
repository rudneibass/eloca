## Backend  
Abra um terminal e execute os seguintes comandos para iniciar o backend da aplicação. Se estiver usando Windows é aconselhavel utilizar o GitBash para executar o 1º comando e o PowerShell como administrador para os demais. Desenvolvido com PHP 7.4.33 e Laravel 10.

1. git clone https://github.com/rudneibass/eloca.git
2. cd eloca/backend
3. composer install
4. php artisan migrate
5. php artisan serve

Se a porta 8000 do seu computador estiver livre o backend será iniciado em http://127.0.0.1:8000, caso contrario verifique no terminal a porta acionada.

## Frontend

Abra um terminal e execute os seguintes comandos para iniciar o frontend da aplicação. Se estiver usando Windows é aconselhavel utilizar PowerShell como administrador. Desenvolvido com Node v16.14.0 e Npm v8.3.1.

1. cd eloca/frontend
2. npm install
3. npm run dev

Se a porta 5173 do seu computador estiver livre o frontend será iniciado em http://127.0.0.1:5173, caso contrario verifique no terminal a porta acionada.
