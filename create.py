# filename: createData.py
# author: Lan
# date: Apr 10, 2019
# description: create a random data sql file for import large data to mysql.

import random

def main():
	fileout = open("testData.sql", "w")
	
	nameList = ["THEO", "THOMAS", "JAMES", "JOSHUA", "HENRY", "WILLIAM", "MAX", "LUCAS", "ETHAN", "ARTHUR", "MASON", "ISAAC", "HARRISON", "TEDDY", "FINLEY", "DANIEL", "RILEY", "EDWARD", "JOSEPH", "ALEXANDER", "ADAM", "REGGIE", "SAMUEL", "JAXON", "SEBASTIAN", "ELIJAH", "HARLEY", "TOBY", "ARLO", "DYLAN", "JUDE", "BENJAMIN", "RORY", "TOMMY", "JAKE", "LOUIE", "CARTER", "JENSON", "HUGO", "BOBBY", "FRANKIE", "OLLIE", "ZACHARY", "DAVID", "ALBIE", "LEWIS", "LUCA", "RONNIE", "JACKSON", "MATTHEW", "ALEX", "HARVEY", "REUBEN", "JAYDEN", "CALEB", "HUNTER", "THEODORE", "NATHAN", "BLAKE", "LUKE", "ELLIOT", "ROMAN", "STANLEY", "DEXTER", "MICHAEL", "ELLIOTT", "TYLER", "RYAN", "ELLIS", "FINN", "ALBERT", "KAI", "LIAM", "CALLUM", "LOUIS", "AARON", "EZRA", "LEON", "CONNOR", "GRAYSON", "JAMIE", "AIDEN", "GABRIEL", "AUSTIN", "LINCOLN", "ELI", "BEN", "OLIVIA", "AMELIA", "ISLA", "EMILY", "AVA", "LILY", "MIA", "SOPHIA", "ISABELLA", "GRACE", "POPPY", "ELLA", "EVIE", "CHARLOTTE", "JESSICA", "DAISY", "SOPHIE", "FREYA", "ALICE", "SIENNA", "IVY", "HARPER", "RUBY", "ISABELLE", "WILLOW", "PHOEBE", "EVELYN", "SCARLETT", "CHLOE", "FLORENCE", "ELSIE", "MILLIE", "LAYLA", "MATILDA", "ROSIE", "ESME", "EVA", "LUCY", "ARIA", "ELLIE", "SOFIA", "MAISIE", "ERIN", "LOLA", "LILLY", "THEA", "IMOGEN", "ELIZA", "BELLA", "MOLLY", "HANNAH", "EMMA", "VIOLET", "LUNA", "AMBER", "LOTTIE", "DARCIE", "MAYA", "GEORGIA", "ELIZABETH", "ZARA", "PENELOPE", "HOLLY", "NANCY", "ROSE", "EMILIA", "HARRIET", "GRACIE", "DARCY", "MILA", "ORLA", "ABIGAIL", "JASMINE", "ELEANOR", "ANNA", "SUMMER", "ROBYN", "LEXI", "HEIDI", "ANNABELLE", "MARIA", "AURORA", "LEAH", "DARCEY", "VICTORIA", "HALLIE", "MARTHA", "AMELIE", "KATIE", "BONNIE", "ARABELLA", "LACEY", "ANNIE", "NIAMH", "LYLA", "IRIS", "ZOE", "CLARA", "MADDISON", "MEGAN"]

	publisherList = ["Penguin Random House", "Hachette Livre", "HarperCollins", "Pan Macmillan", "Pearson Education", "Oxford University Press", "Bloomsbury", "Simon & Schuster"]

	authorID = []
	publisherID = []
	collectionID = []
	userIDList = []
	lNameList = []
	
	genreList = ["Reference", "History", "Science", "Fiction"]
	itemTypeList = ["Book", "DVD", "Blu-ray", "CD"]
	districtList = ["NW", "SW", "NE", "SE"]
	
	titleList = ["ADVENTURE", "HISTORY", "TEST", "TRAVEL", "DAIRY", "STORY", "GAME", "COMPETITION"]
	
	peopleList = ["I", "HE", "SHE", "YOU", "THEY", "IT", "WE"]
	peopleThirdList = ["ME", "HIM", "HER", "YOU", "THEM", "IT", "US"]
	
	verbList = ["EAT", "LOVE", "KILL", "KNOW", "LOOK", "WATCH", "READ", "WRITE", "CREATE", "PLANT", "DELETE", "CONVERT", "SEARCH"]
	nounList = ["CAKE", "COMPANY", "SCHOOL", "HOME", "HOUSE", "BUS", "TRAIN", "PLANE", "BOOK", "MOVIE", "WEBSITE", "BOX", "ARTHOR", "CELLPHONE", "PEOPLE", "STAR", "LIE"]

	i = 0
	# create random admin data
	for i in range(3):
		
		employeeID = ""
		# set random employeeID
		j = 0
		for j in range(5):
			l = random.randint(0, 9)
			employeeID = employeeID + str(l)
		employeeID = int(employeeID)
		
		# set admin name and username
		fn = random.randint(0, len(nameList)-1)
		ln = random.randint(0, len(nameList)-1)
		username = nameList[fn].lower() + nameList[ln].lower()
		adminName = nameList[fn] + " " + nameList[ln]
		
		phoneNumber = ""
		# set phone number
		k = 0
		for k in range(10):
			p = random.randint(0, 9)
			phoneNumber = phoneNumber + str(p)
		
		# set email
		email = username + "@gmail.com"
		
		# set birthday
		y1 = random.randint(6, 9)
		y2 = random.randint(0, 9)
		year = "19" + str(y1) + str(y2)
		
		m1 = random.randint(0, 1)
		if (m1 == 0):
			month = "0" + str(random.randint(1, 9))
		elif (m1 == 1):
			month = "1" + str(random.randint(0, 2))
		
		d1 = random.randint(0, 3)
		if (d1 == 0):
			day = "0" + str(random.randint(1, 9))
		elif (d1 == 1):
			day = "1" + str(random.randint(0, 9))
		elif (d1 == 2):
			day = "2" + str(random.randint(0, 9))
		elif (d1 == 3):
			day = "3" + str(random.randint(0, 1))
		birthday = year + "-" + month + "-" + day

		# set password
		password = username + "pwa"
		
		# write output file
		print("INSERT INTO `admin` (`EmployeeID`, `FullName`, `PhoneNumber`, `Email` , `Birthday`, `UserName`, `Password`) VALUES (%d, '%s', '%s', '%s', '%s', '%s', MD5('%s'));" % (employeeID, adminName, phoneNumber, email, birthday, username, password), file = fileout)


	i = 0
	# create random user data
	for i in range(20):
		
		userID = ""
		# set random userID
		j = 0
		for j in range(6):
			l = random.randint(0, 9)
			userID = userID + str(l)
		userID = int(userID)
		userIDList.append(userID)
		
		# set admin name and username
		fn = random.randint(0, len(nameList)-1)
		ln = random.randint(0, len(nameList)-1)
		username = nameList[fn].lower() + nameList[ln].lower()
		fullName = nameList[fn] + " " + nameList[ln]
		
		phoneNumber = ""
		# set phone number
		k = 0
		for k in range(10):
			p = random.randint(0, 9)
			phoneNumber = phoneNumber + str(p)
		
		# set email
		email = username + "@gmail.com"
		
		# set birthday
		y1 = random.randint(6, 9)
		y2 = random.randint(0, 9)
		year = "19" + str(y1) + str(y2)
		
		m1 = random.randint(0, 1)
		if (m1 == 0):
			month = "0" + str(random.randint(1, 9))
		elif (m1 == 1):
			month = "1" + str(random.randint(0, 2))
		
		d1 = random.randint(0, 3)
		if (d1 == 0):
			day = "0" + str(random.randint(1, 9))
		elif (d1 == 1):
			day = "1" + str(random.randint(0, 9))
		elif (d1 == 2):
			day = "2" + str(random.randint(0, 9))
		elif (d1 == 3):
			day = "3" + str(random.randint(0, 1))
		birthday = year + "-" + month + "-" + day

		# set password
		password = username + "pw"
		
		# write output file
		print("INSERT INTO `users` (`UserID`, `FullName`, `PhoneNumber`, `Email` , `Birthday`, `UserName`, `Password`) VALUES (%d, '%s', '%s', '%s', '%s', '%s', MD5('%s'));" % (userID, fullName, phoneNumber, email, birthday, username, password), file = fileout)


	i = 0
	# create random author data
	for i in range(5):
		
		ID = ""
		# set random ID
		for j in range(4):
			l = random.randint(0, 9)
			ID = ID + str(l)
		ID = int(ID)
		authorID.append(ID)
		
		# set admin name and username
		fn = random.randint(0, len(nameList)-1)
		ln = random.randint(0, len(nameList)-1)
		fullName = nameList[fn] + " " + nameList[ln]
		
		# set birthday
		y1 = random.randint(0, 9)
		y2 = random.randint(0, 9)
		year = "19" + str(y1) + str(y2)
		
		m1 = random.randint(0, 1)
		if (m1 == 0):
			month = "0" + str(random.randint(1, 9))
		elif (m1 == 1):
			month = "1" + str(random.randint(0, 2))
		
		d1 = random.randint(0, 3)
		if (d1 == 0):
			day = "0" + str(random.randint(1, 9))
		elif (d1 == 1):
			day = "1" + str(random.randint(0, 9))
		elif (d1 == 2):
			day = "2" + str(random.randint(0, 9))
		elif (d1 == 3):
			day = "3" + str(random.randint(0, 1))
		birthday = year + "-" + month + "-" + day
		
		# set status of author
		s = random.randint(0, 1)
		if (s == 0):
			status = "Active"
		else:
			status = "Deceased"
		
		# write output file
		print("INSERT INTO `authors` (`id`, `AuthorName`, `Birthday`, `Status`) VALUES (%d, '%s', '%s', '%s');" % (ID, fullName, birthday, status), file = fileout)


	i = 0
	# set the publisher to insert form
	for i in range(len(publisherList)):
		# create id
		ID = ""
		for j in range(7):
			l = random.randint(0, 9)
			ID = ID + str(l)
		ID = int(ID)
		publisherID.append(ID)
		
		print("INSERT INTO `publishers` (`id`, `publishName`) VALUES (%d, '%s');" % (ID, publisherList[i]), file = fileout)
	
	
	i = 0
	# create some random collection
	for i in range(40):
		
		ID = ""
		# set random ID
		for j in range(8):
			l = random.randint(0, 9)
			ID = ID + str(l)
		ID = int(ID)
		collectionID.append(ID)
		
		# set title
		r = random.randint(0, 3)
		if (r == 0):
			title = peopleList[random.randint(0, len(peopleList)-1)] + " " + verbList[random.randint(0, len(verbList)-1)] + " " + nounList[random.randint(0, len(nounList)-1)]
		elif (r == 1):
			title = peopleList[random.randint(0, len(peopleList)-1)] + " " + verbList[random.randint(0, len(verbList)-1)] + " " + peopleThirdList[random.randint(0, len(peopleThirdList)-1)]
		elif (r == 2):
			title = nameList[random.randint(0, len(nameList)-1)] + " " + titleList[random.randint(0, len(titleList)-1)]
		elif (r == 3):
			title = "THE " + nounList[random.randint(0, len(nounList)-1)] + " OF " + nounList[random.randint(0, len(nounList)-1)]
	
		# set genre id
		genre = random.randint(1, 4)
		
		# set author id
		a = random.randint(0, len(authorID)-1)
		author = authorID[a]
		
		# set publish id
		p = random.randint(0, len(publisherID)-1)
		publisher = publisherID[p]
		
		# set price
		price = random.randint(10, 200)
		
		# set itemType
		it = random.randint(0, len(itemTypeList)-1)
		itemType = itemTypeList[it]
		
		print("INSERT INTO `collection` (`id`, `Title`, `GenreID`, `AuthorID`, `PublishID`, `ISBN`, `Price`, `itemType`) VALUES (%d, '%s', %d, %d, %d, %d, %d, '%s');" % (ID, title, genre, author, publisher, ID, price, itemType), file = fileout)


	# create some random rent record
	i = 0
	for i in range(20):
		
		# get collection id
		c = random.randint(0, len(collectionID)-1)
		collection = collectionID[c]
		
		# get user id
		u = random.randint(0, len(userIDList)-1)
		user = userIDList[u]
		
		# set rent date (2019-03-01 min, 2019-04-09 max)
		m1 = random.randint(3, 4)
		if (m1 == 3):
			month = "03"
			d1 = random.randint(0, 3)
			if (d1 == 0):
				day = "0" + str(random.randint(1, 9))
			elif (d1 == 1):
				day = "1" + str(random.randint(0, 9))
			elif (d1 == 2):
				day = "2" + str(random.randint(0, 9))
			elif (d1 == 3):
				day = "3" + str(random.randint(0, 1))
			
		elif (m1 == 4):
			month = "04"
			day = "0" + str(random.randint(1, 9))

		rentDate = "2019-" + month + "-" + day
		
		# set return date 
		returnDate = "2019-0" + str(m1 + 1) + "-" + day
		
		overdue = 0
		# set overdue days
		if ((m1 + 1) == 4):
			if (int(day) <= 9):
				overdue = 9 - int(day)
		else:
			overdue = 0
				
		print("INSERT INTO `rent` (`ISBN`, `CollectionID`, `UserID`, `rentDate`, `returnDate`, `overdue`) VALUES (%d, %d, %d, '%s', '%s', %d);" % (collection, collection, user, rentDate, returnDate, overdue), file = fileout)

		
	# create random libraries
	i = 0
	for i in range(10):
		
		# create address
		ave = random.randint(1, 40)
		district = random.randint(0, 3)
		
		address = str(ave) + " Ave, " + districtList[district] + ", Calgary"
		
		# create name
		lName = str(ave) + " Ave Public Library"
		lNameList.append(lName)
		
		print("INSERT INTO `library` (`address`, `lName`) VALUES ('%s', '%s');" % (address, lName), file = fileout)	
			
			
	# create random event data
	i = 0
	for i in range(10):
		
		# get location
		l = random.randint(0, len(lNameList)-1)
		location = lNameList[l]
		
		# set start time (min 2019-04-01 09:00:00, max 2019-09-31 17:00:00)
		month = random.randint(4, 9)
		d1 = random.randint(0, 3)
		if (d1 == 0):
			day = "0" + str(random.randint(1, 9))
		elif (d1 == 1):
			day = "1" + str(random.randint(0, 9))
		elif (d1 == 2):
			day = "2" + str(random.randint(0, 9))
		elif (d1 == 3):
			day = "3" + str(random.randint(0, 1))
				
		h = random.randint(0, 10)
		if (h < 2):
			hour = "0" + "9"
		else:
			hour = "1" + str(random.randint(2, 7))
		startTime = "2019-0" + str(month) + "-" + day + " " + hour + ":00:00"
		
		# set end time
		hourInt = int(hour) + 1
		if (hourInt <= 9):
			hour = "0" + hourInt
		elif (hourInt > 9):
			hour = str(hourInt)
		endTime = "2019-0" + str(month) + "-" + day + " " + hour + ":00:00"
		
		# set event name
		n = random.randint(0, 1)
		if (n == 0):
			eName = titleList[random.randint(0, len(titleList)-1)] + " EVENT"
		elif (n == 1):
			eName = nounList[random.randint(0, len(nounList)-1)] + " EVENT"
			
		# set description
		description = "This is test event " + str(i)
		
		print("INSERT INTO `event` (`eLocation`, `startTime`, `endTime`, `eName`, `description`) VALUES ('%s', '%s', '%s', '%s', '%s');" % (location, startTime, endTime, eName, description), file = fileout)
		
		
		# create some random register
		j = 0
		for j in range(random.randint(0, 10)):
			ID = userIDList[random.randint(0, len(userIDList)-1)]
			print("INSERT INTO `register` (`UserID`, `eLocation`, `startTime`, `endTime`, `eName`) VALUES (%d, '%s', '%s', '%s', '%s');" % (ID, location, startTime, endTime, eName), file = fileout)
		
	
	# close file
	fileout.close()
	
main()
