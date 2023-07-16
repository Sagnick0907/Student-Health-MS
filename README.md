# Software Engineering Project  
# Student Health Management System  


## Table of Content
  * [Demo](#demo)
  * [Overview](#overview)
  * [Goal](#goal)
  * [Technical Aspect](#technical-aspect)
  * [Technologies Used](#technologies-used)

## Demo
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/a10ff238-5b27-41cf-a980-d79b45f78cb9)  
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/493f6cd2-07aa-4603-a1a2-84367ee50fb7)



## Overview  
Our design was centered around creating a website that would contain the data of all the students. Our web-page will allow the students to register themselves by logging in and filling the relevant features like:
- Personal information (Important details)
- Status of vaccination (type, date)
- Blood group
- Medical history (Diseases, Past major health issue, specific allergy if any)
- Current condition*
*Current condition involves features like body temperature, signs of illness etc. which would be first initialised to normal when a person will register. It could later be changed accordingly, by the user in case of sickness.
All this will be stored in a database and will be able to access by the organising authority.
This would help the organisation to keep a record of how often an individual is feeling sick and taking leave. In case of more than 3 health changes in a month, we could send an alarm for seeking medical alert. This would also help keeping a record of false leave. The other relevant features stored in the database could be used in case of emergency. This would help in effective treatment without much delay. In this way our very aim of serving both the organisation and the students would be fulfilled.  

## Motivation and Goal  
The project has been designed seeing the current scenario of covid. We are looking for a solution that would prevent the spread of the virus. It focuses on keeping a record of the student’s health status. Today we are amidst a pandemic which has changed our life tremendously which has also resulted in a greater impact on our education system. A traditional method of education has become quite foreign and digitalization is the new normal. Many people lost their lives too. But having said that, doctors, scientists, etc have left no stone unturned to bring things back to normal. We have learnt one thing for sure, which is health should be our top most priority. Our schools and colleges would reopen in the near future, keeping a health record.  

## Technical Aspect  
USE CASE MODEL DIAGRAM  
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/2234414b-94ba-43ee-a8d9-e1cae220f210)
This main page contains three options: Admin login, Student login and student signup,
each directing to a particular page
1. Selecting admin login, if we proceed, we get a page which asks for the login
credentials of an admin:
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/4555c22e-7525-4bcd-833f-d7693b3f9504)
1.1 If we fill in wrong details, we can’t login, however if we fill in the correct details, we are
directed to the admin dashboard.
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/20106580-2247-4ca0-86d6-0d157ede593a)

If we select view student details, we need to fill the roll no. of the student after which
the admin can successfully view the student:
Here, the admin is provided three options:
a.) View student Details
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/00f6b705-421e-4ff8-b5ee-a0ed996cdc28)

b.) Analyze
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/20d27f2b-0ffd-4b53-aa1a-a67aadbcee87)
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/3e280480-bf89-4fce-971b-ffa3f1bac531)

c.) Logout

2. Student login: Student on successful login is redirected to the student Dashboard:
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/4770c00f-2f55-4103-8e48-11599554ae5f)
Here the student has the option to view the personal details, selecting which
we see our details displayed:  
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/19daeadf-5a30-4bc0-8a92-2a48b11cc57d)

3. Student sign-up: Here student is asked some information which when submitted creates an account
and stores the information in our main database.  
![image](https://github.com/Sagnick0907/Student-Health-MS/assets/76872499/121db08e-ad7a-4c40-ae65-ccba7afcf587)


## Technologies Used
