INSERT INTO visitor VALUES (1, '1991-09-22', '1238019098', 'Alan', 'B', 'Williams');
INSERT INTO visitor VALUES (2, '1985-08-22', '7889901122', 'Emily', 'A', 'Johnson');
INSERT INTO visitor VALUES (3, '1990-03-15', '5551234567', 'Michael', 'B', 'Smith');
INSERT INTO visitor VALUES (4, '1988-11-28', '9998877766', 'Jessica', 'C', 'Miller');
INSERT INTO visitor VALUES (5, '1977-05-10', '1234567890', 'Daniel', 'M', 'Williams');
INSERT INTO visitor VALUES (6, '1995-09-03', '7778889999', 'Sophia', 'D', 'Jones');
INSERT INTO visitor VALUES (7, '1982-12-18', '4445556666', 'Alexander', 'E', 'Davis');
INSERT INTO visitor VALUES (8, '1999-06-25', '1112223333', 'Olivia', 'F', 'Brown');
INSERT INTO visitor VALUES (9, '1974-04-05', '6667778888', 'Matthew', 'G', 'Taylor');
INSERT INTO visitor VALUES (10, '1989-07-17', '3334445555', 'Emma', 'H', 'Anderson');
INSERT INTO visitor VALUES (11, '1993-02-08', '8889990000', 'William', 'I', 'Martinez');
INSERT INTO visitor VALUES (12, '1980-10-31', '2223334444', 'Ava', 'J', 'Wilson');


INSERT INTO hourly_rate VALUES (1,20);
INSERT INTO hourly_rate VALUES (2, 18);
INSERT INTO hourly_rate VALUES (3, 22);
INSERT INTO hourly_rate VALUES (4, 25);
INSERT INTO hourly_rate VALUES (5, 17);
INSERT INTO hourly_rate VALUES (6, 21);
INSERT INTO hourly_rate VALUES (7, 19);
INSERT INTO hourly_rate VALUES (8, 23);
INSERT INTO hourly_rate VALUES (9, 16);
INSERT INTO hourly_rate VALUES (10, 24);
INSERT INTO hourly_rate VALUES (11, 26);


INSERT INTO building VALUES (17, 'Aquarium Building','Aquarium');
INSERT INTO building VALUES (18, 'Aviary Building','Aviary');
INSERT INTO building VALUES (19, 'Reptile House','Exhibit');
INSERT INTO building VALUES (20, 'Petting Zoo','Exhibit');
INSERT INTO building VALUES (15, 'Animal Hospital','Hospital');
INSERT INTO building VALUES (16, 'Reptile House','House');
INSERT INTO building VALUES (21, 'Insectarium','Exhibit');
INSERT INTO building VALUES (22, 'Penguin Pavilion','Exhibit');
INSERT INTO building VALUES (23, 'Childrens Zoo','Zoo');
INSERT INTO building VALUES (24, 'Childrens Zoo','Zoo');
INSERT INTO building VALUES (25, 'Bird Aviary','Aviary');


INSERT INTO species VALUES (19,'Penguin',80);
INSERT INTO species VALUES (20, 'Tiger', 250);
INSERT INTO species VALUES (21, 'Giraffe', 1800);
INSERT INTO species VALUES (22, 'Elephant', 5000);
INSERT INTO species VALUES (23, 'Kangaroo', 90);
INSERT INTO species VALUES (24, 'Panda', 150);
INSERT INTO species VALUES (25, 'Dolphin', 600);
INSERT INTO species VALUES (26, 'Koala', 12);
INSERT INTO species VALUES (27, 'Lion', 420);
INSERT INTO species VALUES (28, 'Gorilla', 400);
INSERT INTO species VALUES (29, 'Hippopotamus', 2000);
INSERT INTO species VALUES (30, 'Zebra', 1000);
INSERT INTO species VALUES (31, 'Ostrich', 110);
INSERT INTO species VALUES (32, 'Koala', 12);
INSERT INTO species VALUES (33, 'Cheetah', 120);
INSERT INTO species VALUES (34, 'Penguin', 80);


INSERT INTO enclosure VALUES(17,23,1200);
INSERT INTO enclosure VALUES(17,24,800);
INSERT INTO enclosure VALUES(18,28,800);
INSERT INTO enclosure VALUES(19,29,1200);
INSERT INTO enclosure VALUES(19,30,1000);
INSERT INTO enclosure VALUES(15,31,1500);
INSERT INTO enclosure VALUES(16,32,900);
INSERT INTO enclosure VALUES(18,33,1100);
INSERT INTO enclosure VALUES(19,34,1300);
INSERT INTO enclosure VALUES(20,35,950);
INSERT INTO enclosure VALUES(21,36,1050);
INSERT INTO enclosure VALUES(25,37,750);
INSERT INTO enclosure VALUES(25,38,1000);


INSERT INTO animal VALUES (1, 'Healthy', '2010-05-15', 17, 23, 27);
INSERT INTO animal VALUES (2, 'Healthy', '2015-08-10', 17, 29, 29);
INSERT INTO animal VALUES (3, 'Healthy', '2018-02-22', 16, 31, 25);
INSERT INTO animal VALUES (4, 'Healthy', '2012-11-10', 19, 32, 22);
INSERT INTO animal VALUES (5, 'Healthy', '2016-07-05', 15, 36, 26);
INSERT INTO animal VALUES (6, 'Sick', '2019-04-18', 25, 38, 34);
INSERT INTO animal VALUES (7, 'Injured', '2014-09-28', 23, 24, 20);
INSERT INTO animal VALUES (8, 'Sick', '2017-12-01', 22, 33, 26);
INSERT INTO animal VALUES (9, 'Injured', '2013-06-14', 18, 31, 22);
INSERT INTO animal VALUES (10, 'Sick', '2015-10-20', 20, 34, 21);


INSERT INTO observes VALUES (1, 1);
INSERT INTO observes VALUES (1, 2);
INSERT INTO observes VALUES (3, 3);
INSERT INTO observes VALUES (4, 2);
INSERT INTO observes VALUES (5, 7);
INSERT INTO observes VALUES (1, 8);
INSERT INTO observes VALUES (7, 10);
INSERT INTO observes VALUES (2, 6);
INSERT INTO observes VALUES (8, 3);
INSERT INTO observes VALUES (10, 4);


INSERT INTO revenuetypes VALUES (1, 'Event Revenue', 'AS', 15);
INSERT INTO revenuetypes VALUES (2, 'Concession Stand Sales', 'Conc', 16);
INSERT INTO revenuetypes VALUES (3, 'Zoo Admission', 'ZA', 15);
INSERT INTO revenuetypes VALUES (4, 'Event Revenue', 'AS', 18);
INSERT INTO revenuetypes VALUES (5, 'Concession Stand Sales', 'Conc', 18);
INSERT INTO revenuetypes VALUES (6, 'Zoo Admission', 'ZA', 20);
INSERT INTO revenuetypes VALUES (7, 'Event Revenue', 'AS', 21);
INSERT INTO revenuetypes VALUES (8, 'Concession Stand Sales', 'Conc', 21);
INSERT INTO revenuetypes VALUES (9, 'Zoo Admission', 'ZA', 17);
INSERT INTO revenuetypes VALUES (10, 'Event Revenue', 'AS', 24);
INSERT INTO revenuetypes VALUES (11, 'Concession Stand Sales', 'Conc', 22);
INSERT INTO revenuetypes VALUES (12, 'Parking Fees', 'AS', 15);
INSERT INTO revenuetypes VALUES (13, 'Gift Shop Sales', 'Conc', 16);
INSERT INTO revenuetypes VALUES (14, 'Membership Fees', 'ZA', 17);
INSERT INTO revenuetypes VALUES (15, 'Event Revenue', 'AS', 18);
INSERT INTO revenuetypes VALUES (16, 'Concession Stand Sales', 'Conc', 19);
INSERT INTO revenuetypes VALUES (17, 'Zoo Admission', 'ZA', 20);
INSERT INTO revenuetypes VALUES (18, 'Event Revenue', 'AS', 21);
INSERT INTO revenuetypes VALUES (19, 'Concession Stand Sales', 'Conc', 22);
INSERT INTO revenuetypes VALUES (20, 'Zoo Admission', 'ZA', 23);
INSERT INTO revenuetypes VALUES (21, 'Event Revenue', 'AS', 24);
INSERT INTO revenuetypes VALUES (22, 'Concession Stand Sales', 'Conc', 25);


INSERT INTO revenueevents VALUES (3, '2023-01-15', 15000, 200);
INSERT INTO revenueevents VALUES (12, '2023-02-02', 8000, 100);
INSERT INTO revenueevents VALUES (6, '2023-03-10', 25000, 300);
INSERT INTO revenueevents VALUES (17, '2023-04-22', 12000, 150);
INSERT INTO revenueevents VALUES (9, '2023-05-05', 18000, 250);
INSERT INTO revenueevents VALUES (1, '2023-06-12', 10000, 120);
INSERT INTO revenueevents VALUES (20, '2023-07-28', 30000, 400);
INSERT INTO revenueevents VALUES (8, '2023-08-15', 9000, 80);
INSERT INTO revenueevents VALUES (14, '2023-09-03', 15000, 180);
INSERT INTO revenueevents VALUES (22, '2023-10-19', 20000, 280);
INSERT INTO revenueevents VALUES (5, '2023-11-08', 12000, 150);
INSERT INTO revenueevents VALUES (18, '2023-12-25', 18000, 200);
INSERT INTO revenueevents VALUES (2, '2024-01-10', 25000, 300);
INSERT INTO revenueevents VALUES (11, '2024-02-14', 8000, 100);
INSERT INTO revenueevents VALUES (7, '2024-03-22', 30000, 400);
INSERT INTO revenueevents VALUES (13, '2024-04-05', 15000, 180);
INSERT INTO revenueevents VALUES (21, '2024-05-15', 20000, 250);
INSERT INTO revenueevents VALUES (10, '2024-06-30', 10000, 120);
INSERT INTO revenueevents VALUES (16, '2024-07-18', 9000, 80);
INSERT INTO revenueevents VALUES (4, '2024-08-05', 12000, 150);


INSERT INTO animal_show VALUES (1, 10, 15, 5, 3);
INSERT INTO animal_show VALUES (4, 12, 15, 6, 4);
INSERT INTO animal_show VALUES (7, 14, 15, 7, 5);
INSERT INTO animal_show VALUES (10, 15, 15, 8, 6);
INSERT INTO animal_show VALUES (12, 13, 15, 9, 7);
INSERT INTO animal_show VALUES (15, 12, 15, 10, 8);
INSERT INTO animal_show VALUES (18, 11, 15, 11, 9);
INSERT INTO animal_show VALUES (21, 10, 15, 12, 10);


INSERT INTO concession VALUES (2, 'Popcorn');
INSERT INTO concession VALUES (5, 'Soda');
INSERT INTO concession VALUES (8, 'Hot Dog');
INSERT INTO concession VALUES (11, 'Cotton Candy');
INSERT INTO concession VALUES (13, 'Pretzel');
INSERT INTO concession VALUES (16, 'Ice Cream');
INSERT INTO concession VALUES (19, 'Nachos');
INSERT INTO concession VALUES (22, 'Pizza');


INSERT INTO zoo_admission VALUES (3, 10, 15, 5);
INSERT INTO zoo_admission VALUES (6, 11, 15, 6);
INSERT INTO zoo_admission VALUES (9, 12, 15, 7);
INSERT INTO zoo_admission VALUES (14, 13, 15, 8);
INSERT INTO zoo_admission VALUES (17, 14, 15, 9);
INSERT INTO zoo_admission VALUES (20, 15, 15, 10);


INSERT INTO participates_in VALUES (1, 19, 5);
INSERT INTO participates_in VALUES (4, 22, 8);
INSERT INTO participates_in VALUES (7, 25, 10);
INSERT INTO participates_in VALUES (10, 28, 12);
INSERT INTO participates_in VALUES (12, 31, 15);
INSERT INTO participates_in VALUES (15, 34, 7);
INSERT INTO participates_in VALUES (18, 19, 4);
INSERT INTO participates_in VALUES (21, 23, 9);
INSERT INTO participates_in VALUES (1, 20, 6);
INSERT INTO participates_in VALUES (4, 24, 11);
INSERT INTO participates_in VALUES (7, 27, 13);
INSERT INTO participates_in VALUES (10, 30, 8);
INSERT INTO participates_in VALUES (12, 33, 10);
INSERT INTO participates_in VALUES (15, 21, 6);
INSERT INTO participates_in VALUES (18, 22, 9);
INSERT INTO participates_in VALUES (21, 34, 12);


INSERT INTO employee VALUES (1, '2022-01-10', 'Vet', 'John', 'A', 'Smith', '123 Main St', 'City1', 'State1', 12345, null, 1, 2, 3);
INSERT INTO employee VALUES (2, '2022-02-15', 'ACS', 'Mary', 'B', 'Johnson', '456 Oak St', 'City2', 'State2', 56789, null, 2, 5, 6);
INSERT INTO employee VALUES (3, '2022-03-20', 'Maint', 'Robert', 'C', 'Williams', '789 Pine St', 'City3', 'State3', 98765, null, 3, 8, 9);
INSERT INTO employee VALUES (4, '2022-04-25', 'CS', 'Emma', 'D', 'Brown', '101 Maple St', 'City4', 'State4', 54321, null, 4, 11, 14);
INSERT INTO employee VALUES (5, '2022-05-30', 'TS', 'David', 'E', 'Jones', '202 Cedar St', 'City5', 'State5', 67890, 1, 5, 13, 17);
INSERT INTO employee VALUES (6, '2022-06-05', 'Vet', 'Sophia', 'F', 'Taylor', '303 Birch St', 'City6', 'State6', 23456, 2, 6, 16, 20);
INSERT INTO employee VALUES (7, '2022-07-10', 'ACS', 'James', 'G', 'Martinez', '404 Elm St', 'City7', 'State7', 87654, 3, 7, 19, 3);
INSERT INTO employee VALUES (8, '2022-08-15', 'Maint', 'Olivia', 'H', 'Anderson', '505 Walnut St', 'City8', 'State8', 32198, 4, 8, 22, 9);
INSERT INTO employee VALUES (9, '2022-09-20', 'CS', 'Daniel', 'I', 'Garcia', '606 Pine St', 'City9', 'State9', 13579, 1, 9, 5, 6);
INSERT INTO employee VALUES (10, '2022-10-25', 'TS', 'Ava', 'J', 'Rodriguez', '707 Cedar St', 'City10', 'State10', 86420, 2, 10, 5, 20);
INSERT INTO employee VALUES (11, '2022-11-30', 'Vet', 'Liam', 'K', 'Hernandez', '808 Birch St', 'City11', 'State11', 24680, 3, 11, 8, 14);
INSERT INTO employee VALUES (12, '2022-12-05', 'ACS', 'Grace', 'L', 'Lopez', '909 Elm St', 'City12', 'State12', 97531, 4, 2, 11, 6);
INSERT INTO employee VALUES (13, '2023-01-10', 'Maint', 'Logan', 'M', 'Smith', '1010 Maple St', 'City13', 'State13', 35791, 5, 3, 16, 3);
INSERT INTO employee VALUES (14, '2023-02-15', 'CS', 'Zoe', 'N', 'Brown', '1111 Cedar St', 'City14', 'State14', 86429, 6, 4, 19, 14);
INSERT INTO employee VALUES (15, '2023-03-20', 'TS', 'William', 'O', 'Johnson', '1212 Birch St', 'City15', 'State15', 13579, 7, 5, 22, 17);
INSERT INTO employee VALUES (16, '2023-04-25', 'Vet', 'Sofia', 'P', 'Martinez', '1313 Elm St', 'City16', 'State16', 24680, 8, 6, 8, 14);


INSERT INTO cares_for VALUES (1, 19);
INSERT INTO cares_for VALUES (2, 22);
INSERT INTO cares_for VALUES (3, 25);
INSERT INTO cares_for VALUES (4, 28);
INSERT INTO cares_for VALUES (5, 31);
INSERT INTO cares_for VALUES (6, 34);
INSERT INTO cares_for VALUES (7, 19);
INSERT INTO cares_for VALUES (8, 22);
INSERT INTO cares_for VALUES (9, 25);
INSERT INTO cares_for VALUES (10, 28);
INSERT INTO cares_for VALUES (11, 31);
INSERT INTO cares_for VALUES (12, 34);
INSERT INTO cares_for VALUES (13, 19);
INSERT INTO cares_for VALUES (14, 22);
INSERT INTO cares_for VALUES (15, 25);
INSERT INTO cares_for VALUES (16, 28);
INSERT INTO cares_for VALUES (1, 20);
INSERT INTO cares_for VALUES (2, 21);
INSERT INTO cares_for VALUES (11, 23);
INSERT INTO cares_for VALUES (12, 24);
INSERT INTO cares_for VALUES (16, 26);
INSERT INTO cares_for VALUES (6, 27);
INSERT INTO cares_for VALUES (7, 29);
INSERT INTO cares_for VALUES (11, 30);
INSERT INTO cares_for VALUES (1, 32);
INSERT INTO cares_for VALUES (2, 33);
INSERT INTO cares_for VALUES (1, 22);
INSERT INTO cares_for VALUES (11, 33);
INSERT INTO cares_for VALUES (1, 25);
INSERT INTO cares_for VALUES (2, 25);
INSERT INTO cares_for VALUES (2, 28);
INSERT INTO cares_for VALUES (11, 29);
INSERT INTO cares_for VALUES (2, 23);
INSERT INTO cares_for VALUES (12, 26);
INSERT INTO cares_for VALUES (2, 27);
INSERT INTO cares_for VALUES (12, 20);
INSERT INTO cares_for VALUES (2, 30);


INSERT INTO interacts_with VALUES (1, 3);
INSERT INTO interacts_with VALUES (2, 8);
INSERT INTO interacts_with VALUES (3, 12);
INSERT INTO interacts_with VALUES (4, 5);
INSERT INTO interacts_with VALUES (5, 11);
INSERT INTO interacts_with VALUES (6, 7);
INSERT INTO interacts_with VALUES (7, 1);
INSERT INTO interacts_with VALUES (8, 9);
INSERT INTO interacts_with VALUES (9, 16);
INSERT INTO interacts_with VALUES (10, 4);
INSERT INTO interacts_with VALUES (11, 6);
INSERT INTO interacts_with VALUES (12, 14);