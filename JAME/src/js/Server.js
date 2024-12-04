const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');

const app = express();
const port = 5000;

app.use(bodyParser.json());

// Configura tu transporter de Nodemailer
const transporter = nodemailer.createTransport({
    service: 'gmail', // Puedes usar otros servicios como SendGrid
    auth: {
        user: 'tu-correo@gmail.com',
        pass: 'tu-contraseña', // Mejor usa un App Password si usas Gmail
    },
});

// Endpoint para enviar el correo
app.post('/api/enviarCodigo', (req, res) => {
    const { email, codigo } = req.body;

    const mailOptions = {
        from: 'tu-correo@gmail.com',
        to: email,
        subject: 'Código de recuperación de contraseña',
        text: `Tu código de recuperación es: ${codigo}`,
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return res.status(500).json({ success: false, message: error.toString() });
        }
        res.status(200).json({ success: true, message: 'Correo enviado con éxito' });
    });
});

app.listen(port, () => {
    console.log(`Servidor corriendo en el puerto ${port}`);
});
