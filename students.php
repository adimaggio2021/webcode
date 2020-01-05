<!DOCTYPE html>
<html>
<head>
<title>Students</title>
</head>
<body>

<h1> Student Hub </h1>

<h3> Topics </h3>

<form action = "includes/t_search.php" method ="POST">
	Math:
	<br>
	<input type="radio" name="topic" value="MathK6">Math K-6
	<br>
	<input type="radio" name="topic" value="Algebra1">Algebra 1
	<br>
	<input type="radio" name="topic" value="Algebra2">Algebra 2
	<br>
	<input type="radio" name="topic" value="Geometry">Geometry
	<br>
	<input type="radio" name="topic" value="Precalc">Precalculus
	<br>
	<input type="radio" name="topic" value="Calculus">Calculus
	<br>
	<input type="radio" name="topic" value="Statistics">Statistics
	<br>
	<input type="radio" name="topic" value="SATmath">SAT Math
	<br>
	<input type="radio" name="topic" value="ACTmath">ACT Math
	<br>
	<input type="radio" name="topic" value="othermath">Not sure/Other
	<br>
	Science:
	<br>
	<input type="radio" name="topic" value="ScienceK6">K-6 Science
	<br>
	<input type="radio" name="topic" value="Chemistry">Chemistry
	<br>
	<input type="radio" name="topic" value="Physics">Physics
	<br>
	<input type="radio" name="topic" value="Biology">Biology
	<br>
	<input type="radio" name="topic" value="ACTSci">ACT Science
	<br>
	<input type="radio" name="topic" value="earthsci">Environmental Science/Earth Science
	<br>
	<input type="radio" name="topic" value="othersci">Not sure/Other
	<br>
	English:
	<br>
	<input type="radio" name="topic" value="Englishk6">K-6 English
	<br>
	<input type="radio" name="topic" value="ReadingComp">Reading Comprehension
	<br>
	<input type="radio" name="topic" value="Grammar">Grammar and Mechanics
	<br>
	<input type="radio" name="topic" value="Writing">Writing
	<br>
	<input type="radio" name="topic" value="ACTEng">ACT English
	<br>
	<input type="radio" name="topic" value="SATeng">SAT English
	<br>
	<input type="radio" name="topic" value="Litan">Literary Analysis
	<br>
	<input type="radio" name="topic" value="othereng">Not sure/Other
	<br>
	<br>
	Decription:
	<br>
	<textarea name="desc" rows=5 cols=40></textarea>
	<br><br>
	How many minutes of tutoring do you think you will need?
	<input type="text" name="length">
	<br><br>
	Filter(optional):
	<input type="radio" name="Filter" value=1>>1 star
	<br>
	<input type="radio" name="Filter" value=2>>2 stars
	<br>
	<input type="radio" name="Filter" value=3>>3 stars
	<br>
	<input type="radio" name="Filter" value=4>>4 stars
	<br>
	<input type="radio" name="Filter" value=5>>5 stars>
	<br>
	<button type="submit" name="submit">Find a Tutor</button>
</form>


</body>
</html>