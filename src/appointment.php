<div>
    <h1>Schedule an Appointment</h1>
</div>
<div>
    <form method="post" action="process/process.php">
        <input type="text" name="course" placeholder="Course..." required><br><br>
        <input type="text" name="cSection" placeholder="Section..." required><br><br>
        <select name="platform" placeholder="Platform..." required>
            <option value="Big Blue Button">Big Blue Button</option>
            <option value="Zoom">Zoom</option>
            <option value="MS Teams">MS Teams</option>
        </select><br><br>
        <textarea name="comment" placeholder="Comment..." required></textarea><br>
        <input type="submit" value="Schedule" name="schedule">
    </form>
</div>