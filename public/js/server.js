const express = require("express");
const bodyParser = require("body-parser");
const nodemailer = require("nodemailer");

const app = express();
const PORT = 3000;

app.use(bodyParser.urlencoded({ extended: true }));

// Endpoint for handling confirmation emails
app.post("/confirmOrder", (req, res) => {
    const { orderId, userEmail } = req.body;

    // Replace these with your email service details
    const transporter = nodemailer.createTransport({
        service: "gmail",
        auth: {
            user: "your-email@gmail.com",
            pass: "your-email-password"
        }
    });

    const mailOptions = {
        from: "your-email@gmail.com",
        to: userEmail,
        subject: "Order Confirmation",
        text: `Your order with ID ${orderId} has been confirmed. Thank you!`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error(error);
            res.status(500).send("Error sending confirmation email");
        } else {
            console.log("Email sent: " + info.response);
            res.send("Confirmation email sent successfully");
        }
    });
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
