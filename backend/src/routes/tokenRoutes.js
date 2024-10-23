const express = require('express');
const tokenController = require('../controllers/tokenController');
const router = express.Router();
const authenticate = require('../middlewares/authenticate');

/**
 * Routes for /api/tokens
 */

/**
 * @swagger
 * tags:
 *   name: Tokens
 *   description: Endpoints relacionados con la gestión de tokens en Hedera
 */

/**
 * @swagger
 * /tokens/create-token-hedera:
 *   post:
 *     summary: Crea un nuevo token en Hedera
 *     tags: [Tokens]
 *     security:
 *       - bearerAuth: [] # Esto indica que la ruta necesita autenticación
 *     responses:
 *       200:
 *         description: Token creado exitosamente
 *       401:
 *         description: No autorizado (falta o es inválido el token)
 *       500:
 *         description: Error del servidor
 */
router.post('/create-token-hedera', authenticate, tokenController.createToken);

/**
 * @swagger
 * /tokens/list-tokens:
 *   get:
 *     summary: Lista todos los tokens de Hedera
 *     tags: [Tokens]
 *     security:
 *       - bearerAuth: [] # Esto indica que la ruta necesita autenticación
 *     responses:
 *       200:
 *         description: Lista de tokens obtenida exitosamente
 *       401:
 *         description: No autorizado (falta o es inválido el token)
 *       500:
 *         description: Error del servidor
 */
router.get('/list-tokens', authenticate, tokenController.listTokens);

module.exports = router;
