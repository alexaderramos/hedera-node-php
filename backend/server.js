require('dotenv').config();
const express = require('express');
const routes = require('./src/routes/index');
const { errorHandler } = require('./src/middlewares/errorHandler');
const morgan = require('morgan');

const app = express();

app.use(morgan('dev'));

app.use(express.json());

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
