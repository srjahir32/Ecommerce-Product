<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <style>
      * {
        font-family: "Fira Sans", Helvetica, Arial, sans-serif;
      }
      body {
        padding: 1rem !important;
        background-color: #f3f3f3 !important;
      }
      .card {
        text-align: center;
        margin: 0 auto 1rem;
        padding: 2rem;
        max-width: 500px;
        background-color: #f3f3f3;
        border-radius: 10px;
      }
      img {
        max-width: 50%;
        max-height: 30%;
      }
      h2 {
        font-weight: 600;
        text-align: start;
        font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
        margin: 0.5rem 0;
      }
      .start_butto {
          margin: 2rem 0 1rem;
      }
      .start-button {
        background: rgb(58, 118, 246);
        padding: 1rem;
        color: #fff !important;
        border-radius: 10px;
        /* margin: 1rem 0; */
        text-decoration: none;
      }
      .facebook-button {
        background: rgb(58, 118, 246);
        padding: 1rem;
        color: #fff !important;
        border-radius: 10px;
        margin: 1rem auto;
        text-decoration: none;
        display: list-item;
        max-width: 210px;
      }
      h3 {
        font-family: "Fira Sans", Helvetica, Arial, sans-serif;
        font-size: 18px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: -0.2px;
        color: #1b1b1b;
        text-align: start;
      }
      .note {
        font-family: "Fira Sans", Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 20px;
        font-weight: 600;
        letter-spacing: -0.2px;
        color: #9b9b9b;
        padding-inline-end: 1rem;
      }
      .subtitle {
        color: #666;
        text-align: center;
      }
      p {
        color: #9b9b9b;
        font-size: 12pt;
        text-align: start;
        font-weight: 300;
        letter-spacing: -0.2px;
        margin: 0.5rem 0;
      }

      .social-icons {
        text-align: start;
        margin-top: 1rem;
      }
      .social-icons img {
        display: inline-block;
        border: 0;
        line-height: 100%;
        outline: 0;
        font-size: 14px;
        color: #151515;
        width: 21px;
        height: 21px;
      }
      .column {
        display: inline-block;
        width: 50%;
      }
      @media (max-width: 500px) {
        .column {
          display: block;
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <div class="card">
      <img
        src="https://plug.tuppleapps.com/admin/assets/img/logo.png"
        alt=""
      />
    </div>

    <div class="card">
      <h2>Hello {{$name}},</h2>
      <p>
        Thank you for confirming your account and welcome to our smart sales
        community! We built plug&paid to help people like
        <strong>you sell fast and easy</strong>. So we hope we can achieve that
        for you.
      </p>
      <p>
        Now you’re ready to create your first plug and start selling your
        products and services all over the world!
      </p>
      <div class="start_butto" style="text-align: start;">
        <a class="start-button" href="{{ url('dashboard') }}">Start Now!</a>
      </div>
    </div>

    <div class="card">
      <h1>Have a question for us?</h1>
      <p class="subtitle">
        Join in on the conversation on our Facebook group.
      </p>

      <div style="margin: 4rem 0 1rem;">
        <a
          class="facebook-button"
          href="https://www.facebook.com/groups/officialplugnpaid/"
          >Join Our Facebook Group</a
        >
      </div>
      <p class="subtitle">
        Let us know how we can help.
      </p>
    </div>

    <div class="card" style="display: flex; flex-wrap: wrap;">
      <div class="social-div column">
        <h3>Follow Us:</h3>
        <p class="note">
          If plug&paid is helpful and you enjoy using our service, make sure you
          follow our activity.
        </p>
        <div class="social-icons">
          <img
            src="https://ci5.googleusercontent.com/proxy/LUC8hNo4ZTU_l9p-RoKr9ScFDR1hF7LVXRzjdnRacreC36LcC6htTD2CaPTCVrvFeSxKTOQQlz5qlE6ryd_8PbRiMokpQTc8zMY0TnA4Dh-gOVF94dT5tXgv=s0-d-e1-ft#https://plugnpaid-production.s3.eu-central-1.amazonaws.com/icon-pnp.png"
          />
          <img
            src="https://ci4.googleusercontent.com/proxy/bFoxcNlfM_5-hdmUMrk5lmKPEMAUdSeXXRapehM3INmpmImB94Esvb11yCVZ4iBidNGkEaAuxOENMRu6sEr0ORyLVee58r0n0jNJ0kGqklHDChZrjxG-flc=s0-d-e1-ft#https://plugnpaid-production.s3.eu-central-1.amazonaws.com/icon-fb.png"
            alt=""
          />
          <img
            src="https://ci5.googleusercontent.com/proxy/6rWTuovzsoiFQ2kwBPrq5m7V8q39UCH7zsNJHAMgO9YAwC6yUFspB7ggSD8wB2mlnerSPISq-ohc-H7Iygi-degb78h8jCaNS-P_DTvRH0DgfjcBWNxzBlg=s0-d-e1-ft#https://plugnpaid-production.s3.eu-central-1.amazonaws.com/icon-tw.png"
            alt=""
          />
        </div>
      </div>

      <div class="about-div column">
        <h3>About us:</h3>
        <p class="note">
          plug&paid is a productivity software that helps companies build and
          maintain their sales channels with minimal or no technical knowledge
          at all.
        </p>
      </div>
    </div>


  </body>
</html>
