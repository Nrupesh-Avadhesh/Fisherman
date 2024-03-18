<h1>Dear {{ $data['name'] }},</h1>

<p>We hope this message finds you well. </p>

<p>As part of our ongoing efforts to enhance account security, we have received a request to reset the password for your Fisherman account. In response to this request, we are providing you with a temporary password to facilitate the process.</p>

<p>Your Temporary Password: <h4>{{ $data['pass'] }}</h4></p>

<h5>Please follow these steps to complete the password reset:</h5>

<p>1. Visit the Fisherman login page: <a href="{{ $data['login'] }}">login</a><br>
  2. Enter your email address associated with your Fisherman account.<br>
  3. Use the provided temporary password when prompted.<br>
  4. Upon successful login, create a new, secure password of your choice.</p>

<h5>Important Notes:</h5>
<p>- This temporary password is valid for 24 hours for security reasons. Please reset your password promptly.<br>
  - Fisherman will never ask for your password via email or any other communication channel. If you receive any such requests, please disregard them and report the incident to us immediately.</p>

<p>If you did not request a password reset, or if you have any concerns about your account security, please contact our support team at {{ $data['support'] }}. We're here to assist you.</p>

<p>Thank you for choosing Fisherman. We appreciate your cooperation in maintaining the security of your account.</p>

<p>Best regards,</p>

<p>
  {{ $data['name'] }}<br>
Customer Support Team<br>
Fisherman
</p>