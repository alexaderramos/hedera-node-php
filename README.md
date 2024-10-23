# hedera

## Backend Node.js (Express)
For running the backend, you need to have Node.js installed. You can download it from [here](https://nodejs.org/en/download/).

### Postman Collection
Postman collection for the backend API can be found [here](https://www.postman.com/alexander15go/hereda-bacend).

### Swagger Documentation
Swagger documentation for the backend API can be found [here](https://7nrhakpbud.execute-api.us-east-1.amazonaws.com/v1/api-docs/).

### Installation
After installing Node.js, you need to install the dependencies. Run the following command in the root directory of the project:
```
npm install
```
### Configuration
You need to create a `.env` file in the root directory of the project. The file should contain the following variables:
```
HEDERA_ACCOUNT_ID=0.0.123456
HEDERA_PRIVATE_KEY=302e020100300506032b657004220420...
```
You can get the `HEDERA_ACCOUNT_ID` and `HEDERA_PRIVATE_KEY` from the Hedera
portal.

The database connection is configured in the `config.js` file. You can change the connection string to your own database



## Frontend PHP

### Configuration
You need to create a `.env` file in the root directory of the project. The file should contain the following variables:
```
API_URL=http://localhost:3000
```

### Execution
For running the frontend, you can use the PHP built-in server. Just run the following command in the root directory `public` of the project:
```
php -S localhost:8000
```