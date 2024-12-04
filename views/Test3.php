<?php
$sqlsample = "INSERT INTO `resume_experience`(`Resume_experience_ID`, `Job_title`, `Employer`, `City`, `Country`, `What_did_you_do_in_this_job`, `From`, `To`, `I_currently_working_here`, `Resume_ID`) VALUES (".$experience[0]->id_experience.", ".$experience[0]->jobTitle.", ".$experience[0]->employer.", ".$experience[0]->city.", ".$experience[0]->country.", ".$experience[0]->experienceDetails.", ".$experience[0]->from_experience.", ".$experience[0]->to_experience.", ".'no'.", ".$sql_resume_id.")";





/* SELECT COUNT(column_name)
FROM table_name
WHERE condition;

SELECT AVG(column_name)
FROM table_name
WHERE condition;

SELECT column1, column2, ...
FROM table_name
WHERE columnN LIKE pattern;

WHERE CustomerName LIKE 'a%'	Finds any values that start with "a"
WHERE CustomerName LIKE '%a'	Finds any values that end with "a"
WHERE CustomerName LIKE '%or%'	Finds any values that have "or" in any position
WHERE CustomerName LIKE '_r%'	Finds any values that have "r" in the second position
WHERE CustomerName LIKE 'a_%'	Finds any values that start with "a" and are at least 2 characters in length
WHERE CustomerName LIKE 'a__%'	Finds any values that start with "a" and are at least 3 characters in length
WHERE ContactName LIKE 'a%o'	Finds any values that start with "a" and ends with "o"


SELECT column_name(s)
FROM table_name
WHERE column_name BETWEEN value1 AND value2;

SELECT MIN(Price) AS SmallestPrice
FROM Products;
SELECT column1, column2, ...
FROM table_name
ORDER BY column1, column2, ... ASC|DESC;

SELECT column_name(s)
FROM table_name
WHERE condition
GROUP BY column_name(s)
ORDER BY column_name(s);*/