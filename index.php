<!DOCTYPE html>
<html>

<head>
    <title>OS form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
    @import url("https://fonts.googleapis.com/css?family=Poppins:200i,400&display=swap");

    :root {
        --color-white: #f3f3f3;
        --color-darkblue: #1b1b32;
        --color-darkblue-alpha: rgba(27, 27, 50, 0.8);
        --color-green: #37af65;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    body {
        font-family: "Poppins", sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.4;
        color: var(--color-white);
        margin: 0;
    }

    /* mobile friendly alternative to using background-attachment: fixed */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: -1;
        background: var(--color-darkblue);
        background-image: linear-gradient(115deg,
                rgba(58, 58, 158, 0.8),
                rgba(136, 136, 206, 0.7)),
            url(https://cdn.freecodecamp.org/testable-projects-fcc/images/survey-form-background.jpeg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    h1 {
        font-weight: 400;
        line-height: 1.2;
    }

    p {
        font-size: 1.125rem;
    }

    h1,
    p {
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    label {
        display: flex;
        align-items: center;
        font-size: 1.125rem;
        margin-bottom: 0.5rem;
    }

    input,
    button,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    button {
        border: none;
    }

    .container {
        width: 100%;
        margin: 3.125rem auto 0 auto;
    }

    @media (min-width: 576px) {
        .container {
            max-width: 540px;
        }
    }

    @media (min-width: 768px) {
        .container {
            max-width: 720px;
        }
    }

    .header {
        padding: 0 0.625rem;
        margin-bottom: 1.875rem;
    }

    .description {
        font-style: italic;
        font-weight: 200;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
    }

    .clue {
        margin-left: 0.25rem;
        font-size: 0.9rem;
        color: #e4e4e4;
    }

    .text-center {
        text-align: center;
    }

    /* form */

    form {
        background: var(--color-darkblue-alpha);
        padding: 2.5rem 0.625rem;
        border-radius: 0.25rem;
    }

    @media (min-width: 480px) {
        form {
            padding: 2.5rem;
        }
    }

    .form-group {
        margin: 0 auto 1.25rem auto;
        padding: 0.25rem;
    }

    .form-control {
        display: block;
        width: 100%;
        height: 2.375rem;
        padding: 0.375rem 0.75rem;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .input-radio,
    .input-radio {
        display: inline-block;
        margin-right: 0.625rem;
        min-height: 1.25rem;
        min-width: 1.25rem;
    }

    .input-textarea {
        min-height: 120px;
        width: 100%;
        padding: 0.625rem;
        resize: vertical;
    }

    .submit-button {
        display: block;
        width: 100%;
        padding: 0.75rem;
        background: var(--color-green);
        color: inherit;
        border-radius: 2px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 id="title" class="text-center">OS Form</h1>
            <p id="description" class="description text-center">
                Welcome to our survey form! We greatly appreciate your valuable feedback.
            </p>
        </header>
        <form id="survey-form" method="post" action="submit.php">
            <div class="form-group">
                <label id="name-label" for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required />
            </div>
            <div class="form-group">
                <label id="email-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email"
                    required />
            </div>
            <div class="form-group">
                <label id="number-label" for="number">Age<span class="clue">(optional)</span></label>
                <input type="number" name="age" id="number" min="10" max="99" class="form-control" placeholder="Age" />
            </div>


            <div class="form-group">
                <p>Are you satisfied with the current content of the module?</p>
                <label>
                    <input name="user-recommend" value="definitely" type="radio" class="input-radio"
                        checked />Definitely</label>
                <label>
                    <input name="user-recommend" value="maybe" type="radio" class="input-radio" />Maybe</label>

                <label><input name="user-recommend" value="not-sure" type="radio" class="input-radio" />Not sure</label>
            </div>

            <div class="form-group">
                <p>
                    What would you like to see improved?
                    <span class="clue">(Check all that apply)</span>
                </p>

                <label><input name="prefer" value="Advanced_Linux_Administration" type="radio"
                        class="input-radio" />Advanced Linux Administration</label>
                <label>
                    <input name="prefer[]" value="Linux_Security" type="radio" class="input-radio" />Linux
                    Security</label>
                <label><input name="prefer[]" value="Containerization_and_Orchestration" type="radio"
                        class="input-radio" />Containerization and Orchestration</label>
                <label><input name="prefer[]" value="Cloud_Integration" type="radio" class="input-radio" />Cloud
                    Integration</label>
                <label><input name="prefer[]" value="DevOps_Practices" type="radio" class="input-radio" />DevOps
                    Practices</label>

            </div>
            <div class="form-group">
                <p>How well do you feel the module prepared you for practical applications in operating system
                    environments?</p>
                <select id="os-prep" name="osPrep" class="form-control" required>
                    <option disabled selected value>Select an option</option>
                    <option value="1">Not well prepared</option>
                    <option value="2">Somewhat prepared</option>
                    <option value="3">Prepared</option>
                    <option value="4">Well prepared</option>
                    <option value="5">Very well prepared</option>
                </select>
            </div>
            <div class="form-group">
                <p>Which domain are you interested in pursuing in the future?</p>
                <select id="most-like" name="mostLike" class="form-control" required>
                    <option disabled selected value>Select an option</option>
                    <option value="DevOps">DevOps</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                    <option value="Cloud Computing">Cloud Computing</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <p>Any comments or suggestions?</p>
                <textarea id="comments" class="input-textarea" name="comment"
                    placeholder="Enter your comment here..."></textarea>
            </div>

            <div class="form-group">
                <button type="submit" id="submit" class="submit-button">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>

</html>