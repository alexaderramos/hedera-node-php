require('dotenv').config();
const express = require('express');
const routes = require('./src/routes/index');
const { errorHandler } = require('./src/middlewares/errorHandler');
const cors = require('cors');
const morgan = require('morgan');
const awsServerlessExpress = require('aws-serverless-express');

const app = express();
const server = awsServerlessExpress.createServer(app);

app.use(morgan('dev'));

app.use(express.json());

/**
 * Middleware for CORS
 */
const whitelist = [
  'http://localhost:3000',
  'https://hedera-frontend.hatunperu.com',
];
const corsOptions = {
  origin: (origin, callback) => {
    if (whitelist.includes(origin) || !origin) {
      callback(null, true);
    } else {
      callback(new Error('Not allowed by CORS'));
    }
  },
};
app.use(cors(corsOptions));

app.use('', routes);

/**
 * Middleware for error handling
 */
app.use(errorHandler);

// Servidor
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Servidor corriendo en el puerto ${PORT}`);
});

exports.handler = (event, context) => {
  awsServerlessExpress.proxy(server, event, context);
};
