
<?php
session_start();
if(isset($_SESSION["user_data"]))
{
	header("location:./gm/dashboard/user/");
}
?>
<?php include 'header.php';?>
<div class="wrapper">
      <div class="tabs">
        <button class="navTab active" data-toggle="login">Login</button>
        <button class="navTab" data-toggle="register">Register</button>
      </div>
      <div class="contentWrapper">
        <div class="content active" id="login">
          <form action="secure_login.php" method="POST" autocomplete="off">
            <div class="formGroup">
              <label for="email">Email address</label>
              <input
                type="email"
                id="email"
                placeholder="name@example.com"
                required
              />
              <small class="messageHelp">
              </small>
              <label for="password">Password</label>
              <input
                type="password"
                id="password"
                placeholder="Password"
                required
              />
              <small class="messageHelp">Password incorrect</small>
              <div>
                <input type="checkbox" id="checkBox" />
                <span>Keep me Signed in</span>
              </div>
              <a href="#" id="passwordReset">Forgot password?</a>
              <button class="btn" type="submit">Login</button>
            </div>
          </form>
        </div>
        <div class="content" id="register">
          <form action="#" method="POST" autocomplete="off">
            <div class="formGroup">
              <label for="username">Username</label>
              <input
                type="text"
                id="username"
                placeholder="Username"
                required
              />
              <label for="email">Email address</label>
              <input
                type="email"
                id="email"
                placeholder="name@example.com"
                required
                title="Enter a valid email address"
              />
              <label for="email">Date of Birth</label>
              <input
                type="date"
                id="dob"
                required
                title="Enter your date of birth"
              />
              <small class="messageHelp">
                Enter a valid email address
              </small>
              <label for="password">Password</label>
              <input
                type="password"
                id="password"
                placeholder="Password"
                required
                title="Must be at least 6 characters"
              />
              <small class="messageHelp">Must be at least 6 characters</small>
              <label for="confirmPassword">Confirm password</label>
              <input
                type="password"
                id="confirmPassword"
                placeholder="Confirm Password"
              />
              <small class="messageHelp">Password incorrect</small>
              <button class="btn" type="submit">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  font-size: 10px;
}
body {
  min-height: 100vh;
  display: grid;
  place-content: center;
  text-rendering: optimizeSpeed;
  padding: 2em;
  background: linear-gradient(
    90deg,
    hsla(328, 75%, 45%, 1) 0%,
    hsla(269, 85%, 41%, 1) 100%
  );

  line-height: 1.4;
  font-family: 'Work Sans', sans-serif;
}

input,
label,
small,
button {
  display: block;
}

.wrapper {
  padding-top:100px;
  width: 500px;
  height: auto;
  margin: auto;
  position: relative;
}
.tabs {
  width: 100%;
  height: 7rem;
  display: flex;
  justify-content: center;
  position: absolute;
  top: 45px;
  left: 0;
  z-index: 0;
}
.navTab {
  display: flex;
  justify-content: center;
  padding: 1em 0;
  width: 50%;
  border: 0;
  outline: 0;
  font-size: 1.6rem;
  font-weight: 500;
  background: linear-gradient(
    90deg,
    hsla(328, 75%, 45%, 1) 0%,
    hsla(269, 85%, 41%, 1) 100%
  );
  color: hsl(0, 0%, 100%);
  border-radius: 30px 30px 0 0;
  cursor: pointer;
}

.navTab.active {
  background: #ffffff;
  color: hsl(0, 0%, 10%);
}

.contentWrapper {
  width: 100%;
  position: relative;
  padding: 2em;
  border-radius: 30px;
  background-color: hsl(0, 0%, 100%);
  box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.4);
}
.content {
  display: none;
  overflow: hidden;
  z-index: 1000;
  animation: fadeIn 1s ease-in-out;
}
@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
.form-group {
  display: flex;
  flex-direction: column;
}
.formGroup label {
  display: inline-block;
  margin: 0.5em 0;
  font-size: 1.3em;
  font-weight: 400;
  color: #1f1414;
}

.formGroup input:not(input[type='checkbox']) {
  width: 100%;
  height: 40px;
  padding: 0 0.5em;
  font-weight: 1.5rem;
  font-weight: 400;
  color: hsl(0, 0%, 10%);
  outline: 0;
  border: 1px solid #e5e1e1;
}
.formGroup input[type='checkbox'] {
  cursor: pointer;
}

.formGroup input::placeholder {
  color: #b3b3b3;
}

.formGroup div {
  display: flex;
  align-items: center;
  gap: 0.5em;
  margin: 1em 0;
}
.formGroup div span {
  color: hsl(203, 6%, 41%);
  cursor: pointer;
  user-select: none;
}

.messageHelp {
  margin: 0.5em 0;
  font-size: 1.1rem;
  color: hsl(203, 20%, 41%);
  user-select: none;
}
#register input:first-of-type {
  margin-bottom: 1em;
}
#passwordReset {
  display: inline-block;
  position: absolute;
  top: 66%;
  right: 3rem;
  color: hsl(354, 70%, 54%);
  font-size: 1.1rem;
  font-weight: 500;
}
.btn {
  width: 100%;
  padding: 0.75em 1em;
  margin: 2em 0 0 0;
  border: 0;
  outline: 0;
  font-size: 1.6rem;
  font-weight: 600;
  letter-spacing: 1px;
  border-radius: 30px;
  background: linear-gradient(
    90deg,
    hsla(328, 75%, 45%, 1) 0%,
    hsla(269, 85%, 41%, 1) 100%
  );
  color: hsl(0, 0%, 100%);
  cursor: pointer;
  transition: all 250ms ease-in-out;
}

.content.active {
  display: block;
}

    </style>
    <script>
        const tabs = document.querySelector(".tabs");
const tabButton = document.querySelectorAll(".navTab");
const content = document.querySelectorAll(".content");

tabs.addEventListener("click", e => {
	const id = e.target.dataset.toggle;
	if (id) {
		tabButton.forEach(navTab => {
			navTab.classList.remove("active");
		});
		e.target.classList.add("active");
	}
	content.forEach(content => {
		content.classList.remove("active");
	});

	const element = document.getElementById(id);
	element.classList.add("active");
});
    </script>
<?php include 'footer.php';?>