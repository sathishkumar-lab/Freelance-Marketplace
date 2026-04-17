<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Freelance Community</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f7f7f7;
    }

    .container {
      display: flex;
      width: 100%;
      height: 100vh;
      background-color: #ffffff;
    }

    .left-section {
      flex: 1;
      background-color: #233554;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 12px;
      max-width: 35%;
    }

    .left-section h1 {
      font-size: 3rem;
      margin-bottom: 20px;
    }

    .left-section img {
      max-width: 80%;
      height: auto;
      margin-bottom: 20px;
    }

    .left-section p {
      font-size: 1.2rem;
      text-align: center;
    }

    .right-section {
      flex: 1;
      background-color: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .right-section h2 {
      font-size: 1.8rem;
      margin-bottom: 20px;
      text-align: center;
    }

    form {
      width: 100%;
      max-width: 400px;
      display: flex;
      flex-direction: column;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: center;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      text-align: left;
    }

    form input {
      width: 100%;
      height: 45px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    form button {
      padding: 12px;
      font-size: 1rem;
      color: white;
      background-color: #00214d;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 10px;
    }

    form button:hover {
      background-color: #004080;
    }

    form button:disabled {
      background-color: #cccccc;
      cursor: not-allowed;
    }

    .login-link {
      margin-top: 10px;
      text-align: center;
    }

    .login-link a {
      color: #233554;
      text-decoration: none;
      font-weight: bold;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .terms {
  padding: 5px 50px;
  line-height: 30px;
  margin-bottom: 20px;
  text-align: justify;
  max-height: 300px; /* Limits height */
  overflow-y: auto; /* Enables scrolling */
  border: 1px solid #ccc; /* Optional: adds a border for clarity */
  padding: 10px;
}

    .terms a {
      color: #233554;
      text-decoration: none;
      font-weight: bold;
      cursor: pointer;
    }

    .terms a:hover {
      text-decoration: underline;
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  width: 50%;
  border-radius: 10px;
  text-align: left;
  position: relative;
  max-height: 100vh; /* Ensures the modal doesn't exceed viewport height */
  overflow-y: auto; /* Enables scrolling */
}

    .close {
      color: red;
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .modal-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .agree-btn, .disagree-btn {
      padding: 10px 20px;
      font-size: 1rem;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .agree-btn {
      background-color: #004080;
      color: white;
    }

    .disagree-btn {
      background-color: red;
      color: white;
    }

    .card {
            width: 100%;
            max-width: 1300px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        h1{
            text-align: center;
        }
        h1, h2 {
            color: #00214d;
        }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-section">
      <h1>.Freelance</h1>
      <img src="sign in image.png" alt="Community Illustration">
      <p>Online Community For Freelancers</p>
    </div>
    <div class="right-section">
      <h2>Join & Connect the Fastest Growing </h2>
      <h2 style="margin-bottom: 0px;">Online Community</h2>
      <br><br>
      <form action="register.php" method="POST" id="signup-form">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required>
        </div>
        <div class="terms">
          <input type="checkbox" id="agree-checkbox" hidden>
          By signing up, you agree to our <a id="terms-link" href="#">Terms & Conditions</a>
        </div>
        <br>
        <button type="submit" id="signup-btn" disabled><b>Sign Up</b></button>
        <div class="login-link">
          Already have an account? <a href="login.php">Log in</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal -->
  <div id="terms-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="card">
    <h1>Terms and Conditions</h1>
        <div class="terms">
      <h2>Introduction</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to our freelance platform, a digital marketplace that connects skilled professionals with clients seeking their services. By accessing or using our platform, you acknowledge that you have read, understood, and agreed to comply with these Terms and Conditions. These terms govern the use of our website, the rights and responsibilities of users, and the overall conduct expected within our platform.
Our goal is to provide a secure and efficient environment for freelancers and clients to collaborate on various projects. We facilitate communication, transactions, and service delivery between parties while ensuring transparency and professionalism. However, we do not directly participate in projects, nor do we guarantee specific outcomes or quality of work.
By continuing to use our platform, you accept any modifications or updates made to these terms over time. We reserve the right to revise our policies to improve user experience, comply with legal requirements, and enhance security measures. It is the responsibility of users to stay informed about these updates..</p>
            
            <h2>User Registration</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To access our platform, users must create an account by providing accurate and complete information. This includes details such as name, email address, and payment credentials, which are necessary for identification and secure transactions. Providing false or misleading information may result in the suspension or termination of your account.
We require all users to maintain the confidentiality of their login credentials. You are solely responsible for any activity that occurs under your account, and you should never share your password or allow unauthorized access. If you suspect any breach of security, it is your responsibility to notify our support team immediately.
Our platform reserves the right to verify user identities, request additional documentation, and reject or approve registrations at our discretion. These measures are in place to maintain a trusted marketplace, prevent fraud, and ensure compliance with legal standards.</p>
            
            <h2>Freelancer and Client Responsibilities</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Freelancers are expected to deliver high-quality work within the agreed-upon deadlines. This includes maintaining professional communication, following project instructions, and ensuring that all submissions meet the client’s requirements. Any delays or failure to meet expectations may lead to disputes, cancellations, or penalties.
Clients, on the other hand, must provide clear and detailed instructions for their projects. They are responsible for ensuring that the scope of work is well-defined and that freelancers receive all necessary information to complete the job. Additionally, clients must process payments promptly to ensure fair compensation for services rendered.
Both freelancers and clients must engage in ethical business practices. This includes avoiding exploitation, misrepresentation, or unfair treatment of any party. Failure to adhere to these responsibilities may result in warnings, suspension, or permanent removal from the platform.

</p>
            
            <h2>Payments and Fees</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All financial transactions between freelancers and clients must be conducted through our platform’s secure payment system. This ensures transparency, prevents fraud, and provides both parties with proof of payment and service completion. External transactions that bypass our system violate our terms and may result in account suspension.
Our platform charges a service fee on each transaction to cover operational costs, security features, and customer support services. The fee structure may vary depending on factors such as transaction value, membership status, or promotional offers. Users will always be informed of applicable charges before finalizing a payment.
We reserve the right to adjust our fee structure at any time. Any changes will be communicated in advance, and continued use of our services after fee adjustments implies acceptance of the new rates. Users who disagree with updated fees may discontinue their use of our platform.

</p>
            
            <h2>Intellectual Property</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All work produced by freelancers remains their intellectual property until full payment has been received from the client. This means that freelancers have the right to retain ownership and control of their work unless otherwise stated in a contract or agreement between both parties.
Once payment is successfully processed, ownership of the completed work transfers to the client. The client then has full rights to use, modify, or distribute the work as needed. However, freelancers may include specific licensing terms if agreed upon beforehand, such as retaining the right to showcase work in their portfolio.
Unauthorized use, reproduction, or distribution of a freelancer’s work without consent is strictly prohibited. Clients and freelancers must ensure that all agreements regarding ownership and licensing are clear before project completion to avoid any disputes.

</p>
            
            <h2>Confidentiality</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Both freelancers and clients are expected to maintain confidentiality regarding project details, sensitive data, and private communications shared during the collaboration process. Any unauthorized sharing, leaking, or misusing confidential information may result in legal consequences.
Clients should only provide freelancers with information that is essential for project completion. Likewise, freelancers should ensure that any proprietary methods, ideas, or unpublished content provided by the client remain secure and undisclosed to third parties.
We take privacy and security seriously and provide encrypted communication tools to facilitate safe transactions. However, we are not responsible for any breaches that occur due to negligence by either party. Users should always exercise caution when sharing sensitive data.</p>
            
            <h2>Dispute Resolution</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In case of disagreements between freelancers and clients, our platform provides a dispute resolution process to mediate and reach a fair settlement. Disputes must be reported through our support system with supporting evidence, such as project requirements, submitted work, and communication logs.
Our team will review the evidence provided and make a decision based on the terms of service and fair business practices. While we strive to resolve disputes amicably, users acknowledge that the final decision rests with our platform’s dispute resolution team.
To minimize disputes, we encourage clear communication, well-documented project agreements, and milestone-based payments. Taking these preventive measures helps ensure smoother transactions and professional collaborations.

</p>
            
            <h2>Account Termination</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We reserve the right to suspend or terminate accounts that violate our policies, engage in unethical behavior, or disrupt the integrity of our platform. This includes fraudulent activity, harassment, non-payment, plagiarism, and misrepresentation of skills or experience.
Account termination may be temporary or permanent, depending on the severity of the violation. Users who repeatedly breach our policies may be banned from accessing our platform indefinitely. Appeals may be considered in specific cases if sufficient evidence is provided to support the claim.
To maintain a safe and productive environment, we encourage all users to report suspicious activity or misconduct. Our team takes violations seriously and will take appropriate actions to protect the community.</p>
            
            <h2>Limitation of Liability</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our platform serves as an intermediary to connect freelancers with clients but does not assume responsibility for the quality of work, fulfillment of obligations, or financial losses resulting from disputes. Users engage in transactions at their own risk.
We do not guarantee that freelancers will find work or that clients will receive perfect results. Both parties must conduct due diligence before entering into agreements and take necessary precautions to protect their interests.
By using our services, users agree to hold our platform harmless from any claims, damages, or liabilities arising from disputes, project failures, or unforeseen circumstances beyond our control.</p>
            
            <h2>Changes to Terms</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We reserve the right to modify these Terms and Conditions at any time to reflect updates in our policies, legal requirements, or business operations. Any changes will be communicated through notifications or updates on our website.
Users are responsible for reviewing the terms periodically to stay informed about any modifications. Continued use of our platform after changes are made implies acceptance of the revised terms.
If users disagree with any updates, they may discontinue their use of our services. However, registered users must still adhere to any agreements made before changes take effect.</p>
</div>      
      </div>
<div class="modal-buttons">
        <button class="agree-btn">Agree</button>
        <button class="disagree-btn">Disagree</button>
      </div>
    </div>
  </div>

  <script>
    const modal = document.getElementById("terms-modal");
    const btn = document.getElementById("terms-link");
    const closeBtn = document.querySelector(".close");
    const agreeBtn = document.querySelector(".agree-btn");
    const disagreeBtn = document.querySelector(".disagree-btn");
    const agreeCheckbox = document.getElementById("agree-checkbox");
    const signupBtn = document.getElementById("signup-btn");

    btn.onclick = function(event) {
      event.preventDefault();
      modal.style.display = "block";
    }

    closeBtn.onclick = function() {
      modal.style.display = "none";
    }

    agreeBtn.onclick = function() {
      agreeCheckbox.checked = true;
      signupBtn.disabled = false;
      modal.style.display = "none";
    }

    disagreeBtn.onclick = function() {
      agreeCheckbox.checked = false;
      signupBtn.disabled = true;
      modal.style.display = "none";
    }
  </script>
</body>
</html>

