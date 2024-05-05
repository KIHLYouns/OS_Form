<!DOCTYPE html>
<html>

<head>
    <title>OS form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
                <p>Are you satisfied with the current content of the module?</p>
                <label>
                    <input name="user-recommend" value="definitely" type="radio" class="input-radio"
                        checked />Definitely</label>
                <label>
                    <input name="user-recommend" value="maybe" type="radio" class="input-radio" />Maybe</label>
            </div>

            <div class="form-group">
                <p>
                    What would you like to see improved?
                    <span class="clue">(Check all that apply)</span>
                </p>

                <p>
                    <label>
                        <input name="prefer" value="Linux Security" type="radio" class="input-radio" />Linux
                        Security</label>
                    <label>
                        <input name="prefer" value="Cloud Integration" type="radio" class="input-radio" />Cloud
                        Integration</label>
                    <label>
                        <input name="prefer" value="DevOps Practices" type="radio" class="input-radio" />DevOps
                        Practices</label>
                </p>

            </div>
            <div class="form-group">
                <p>How well do you feel the module prepared you for practical applications in operating system
                    environments?</p>
                <select id="os-prep" name="osPrep" class="form-control" required>
                    <option disabled selected value>Select an option</option>
                    <option value="Somewhat prepared">Somewhat prepared</option>
                    <option value="prepared">Prepared</option>
                    <option value="Well prepared">Well prepared</option>
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
