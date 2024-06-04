const nodemailer = require('nodemailer');

exports.handler = async (event, context) => {
  const { name, email, mobile, subject, message } = JSON.parse(event.body);

  let transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'risticfilip712@gmail.com',
      pass: 'akug nbnb ahvw gxjy'
    }
  });

  let mailOptions = {
    from: 'risticfilip712@gmail.com',
    to: 'risticfilip712@gmail.com',
    subject: subject,
    html: `<p>Name: ${name}</p><p>Email: ${email}</p><p>Mobile: ${mobile}</p><p>Message: ${message}</p>`
  };

  try {
    await transporter.sendMail(mailOptions);
    return {
      statusCode: 200,
      body: JSON.stringify({ message: 'Email sent successfully' })
    };
  } catch (error) {
    return {
      statusCode: 500,
      body: JSON.stringify({ message: 'Failed to send email', error: error.message })
    };
  }
};
