# filename: createData.py
# author: Lan
# date: Apr 10, 2019
# description: create a random data sql file for import large data to mysql.

import random
from datetime import *

def main():
	fileout = open("testData.sql", "w")
	
	nameList = ["THEO", "THOMAS", "JAMES", "JOSHUA", "HENRY", "WILLIAM", "MAX", "LUCAS", "ETHAN", "ARTHUR", "MASON", "ISAAC", "HARRISON", "TEDDY", "FINLEY", "DANIEL", "RILEY", "EDWARD", "JOSEPH", "ALEXANDER", "ADAM", "REGGIE", "SAMUEL", "JAXON", "SEBASTIAN", "ELIJAH", "HARLEY", "TOBY", "ARLO", "DYLAN", "JUDE", "BENJAMIN", "RORY", "TOMMY", "JAKE", "LOUIE", "CARTER", "JENSON", "HUGO", "BOBBY", "FRANKIE", "OLLIE", "ZACHARY", "DAVID", "ALBIE", "LEWIS", "LUCA", "RONNIE", "JACKSON", "MATTHEW", "ALEX", "HARVEY", "REUBEN", "JAYDEN", "CALEB", "HUNTER", "THEODORE", "NATHAN", "BLAKE", "LUKE", "ELLIOT", "ROMAN", "STANLEY", "DEXTER", "MICHAEL", "ELLIOTT", "TYLER", "RYAN", "ELLIS", "FINN", "ALBERT", "KAI", "LIAM", "CALLUM", "LOUIS", "AARON", "EZRA", "LEON", "CONNOR", "GRAYSON", "JAMIE", "AIDEN", "GABRIEL", "AUSTIN", "LINCOLN", "ELI", "BEN", "OLIVIA", "AMELIA", "ISLA", "EMILY", "AVA", "LILY", "MIA", "SOPHIA", "ISABELLA", "GRACE", "POPPY", "ELLA", "EVIE", "CHARLOTTE", "JESSICA", "DAISY", "SOPHIE", "FREYA", "ALICE", "SIENNA", "IVY", "HARPER", "RUBY", "ISABELLE", "WILLOW", "PHOEBE", "EVELYN", "SCARLETT", "CHLOE", "FLORENCE", "ELSIE", "MILLIE", "LAYLA", "MATILDA", "ROSIE", "ESME", "EVA", "LUCY", "ARIA", "ELLIE", "SOFIA", "MAISIE", "ERIN", "LOLA", "LILLY", "THEA", "IMOGEN", "ELIZA", "BELLA", "MOLLY", "HANNAH", "EMMA", "VIOLET", "LUNA", "AMBER", "LOTTIE", "DARCIE", "MAYA", "GEORGIA", "ELIZABETH", "ZARA", "PENELOPE", "HOLLY", "NANCY", "ROSE", "EMILIA", "HARRIET", "GRACIE", "DARCY", "MILA", "ORLA", "ABIGAIL", "JASMINE", "ELEANOR", "ANNA", "SUMMER", "ROBYN", "LEXI", "HEIDI", "ANNABELLE", "MARIA", "AURORA", "LEAH", "DARCEY", "VICTORIA", "HALLIE", "MARTHA", "AMELIE", "KATIE", "BONNIE", "ARABELLA", "LACEY", "ANNIE", "NIAMH", "LYLA", "IRIS", "ZOE", "CLARA", "MADDISON", "MEGAN"]

	publisherList = ["Penguin Random House", "Hachette Livre", "HarperCollins", "Pan Macmillan", "Pearson Education", "Oxford University Press", "Bloomsbury", "Simon & Schuster"]

	authorID = []
	publisherID = []
	collectionID = []
	employeeIDList = []
	userIDList = []
	rentList = []
	lNameList = []
	addressList = []
	eventList = []
	registerList = []
	
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
		
		# set random employeeID
		u = 0
		while (u < 1):
			j = 0
			employeeID = ""
			for j in range(5):
				l = random.randint(0, 9)
				employeeID = employeeID + str(l)
			employeeID = int(employeeID)
			
			if (employeeID not in employeeIDList):
				u = u + 1
				
		employeeIDList.append(employeeID)
		
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
		year = random.randint(1960, 1999)
		month = random.randint(1, 12)
		day = random.randint(1, 30)

		birthday = date(year, month, day)

		# set password
		password = username + "pwa"
		
		# write output file
		print("INSERT INTO `admin` (`EmployeeID`, `FullName`, `PhoneNumber`, `Email` , `Birthday`, `UserName`, `Password`) VALUES (%d, '%s', '%s', '%s', '%s', '%s', MD5('%s'));" % (employeeID, adminName, phoneNumber, email, birthday, username, password), file = fileout)


	i = 0
	# create random user data
	for i in range(20):
		
		# set random userID
		u = 0
		while (u < 1):
			j = 0
			userID = ""
			for j in range(6):
				l = random.randint(0, 9)
				userID = userID + str(l)
			userID = int(userID)
			
			if (userID not in userIDList):
				u = u + 1
		
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
		year = random.randint(1900, 1999)
		month = random.randint(1, 12)
		day = random.randint(1, 30)

		birthday = date(year, month, day)

		# set password
		password = username + "pw"
		
		# write output file
		print("INSERT INTO `users` (`UserID`, `FullName`, `PhoneNumber`, `Email` , `Birthday`, `UserName`, `Password`) VALUES (%d, '%s', '%s', '%s', '%s', '%s', MD5('%s'));" % (userID, fullName, phoneNumber, email, birthday, username, password), file = fileout)


	i = 0
	# create random author data
	for i in range(5):
		
		u = 0
		while (u < 1):
			ID = ""
			# set random ID
			for j in range(4):
				l = random.randint(0, 9)
				ID = ID + str(l)
			ID = int(ID)
			if (ID not in authorID):
				u = u + 1
		
		authorID.append(ID)
		
		# set admin name and username
		fn = random.randint(0, len(nameList)-1)
		ln = random.randint(0, len(nameList)-1)
		fullName = nameList[fn] + " " + nameList[ln]
		
		# set birthday
		year = random.randint(1900, 1999)
		month = random.randint(1, 12)
		day = random.randint(1, 30)

		birthday = date(year, month, day)
		
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
		u = 0
		while (u < 1):
			ID = ""
			for j in range(7):
				l = random.randint(0, 9)
				ID = ID + str(l)
			ID = int(ID)
			if (ID not in publisherID):
				u = u + 1
				
		publisherID.append(ID)
		
		print("INSERT INTO `publishers` (`id`, `publishName`) VALUES (%d, '%s');" % (ID, publisherList[i]), file = fileout)
	
	
	i = 0
	# create some random collection
	for i in range(40):
		
		u = 0
		while (u < 1):
			ID = ""
			# set random ID
			for j in range(8):
				l = random.randint(0, 9)
				ID = ID + str(l)
			ID = int(ID)
			if (ID not in collectionID):
				u = u + 1
			
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
		
		j = 0
		while (j < 1):
			# get collection id
			c = random.randint(0, len(collectionID)-1)
			collection = collectionID[c]
		
			# get user id
			u = random.randint(0, len(userIDList)-1)
			user = userIDList[u]
			
			if ([collection, user] not in rentList):
				j = j + 1
		
		rentList.append([collection, user])
		
		# set rent date (2019-03-01 min, 2019-04-09 max)
		month = random.randint(3, 4)
		day = random.randint(1, 30)

		rentDate = date(2019, month, day)
		
		# set return date 
		returnDate = rentDate + timedelta(days=+30)
		
		overdue = 0
		today = date.today()
		# set overdue days
		if (today <= returnDate):
			overdue = 0
		elif (today > returnDate): 
			overdue = (today - returnDate).days
				
		
		print("INSERT INTO `rent` (`ISBN`, `CollectionID`, `UserID`, `rentDate`, `returnDate`, `overdue`) VALUES (%d, %d, %d, '%s', '%s', %d);" % (collection, collection, user, rentDate, returnDate, overdue), file = fileout)

		
	# create random libraries
	i = 0
	for i in range(10):
		
		j = 0
		while (j < 1):
			# create address
			ave = random.randint(1, 40)
			district = random.randint(0, 3)
			
			address = str(ave) + " Ave, " + districtList[district] + ", Calgary"
			if (ave not in addressList):
				j = j + 1
				
		addressList.append(ave)
		
		# create name
		lName = str(ave) + " Ave Public Library"
		lNameList.append(lName)
		
		print("INSERT INTO `library` (`address`, `lName`) VALUES ('%s', '%s');" % (address, lName), file = fileout)	
			
			
	# create random event data
	i = 0
	for i in range(10):
		k = 0
		while (k < 1): 
			# get location
			l = random.randint(0, len(lNameList)-1)
			location = lNameList[l]
		
			# set start time (min 2019-04-01 09:00:00, max 2019-09-31 17:00:00)
			month = random.randint(4, 6)
			day = random.randint(1, 30)
			hour = random.randint(9, 16)
			minute = random.randint(0, 59)

			startTime = datetime(2019, month, day, hour, minute, 0)
		
			# set end time
			h = random.randint(0, 2)
			m = random.randint(0, 59)
			
			endTime = startTime + timedelta(hours=+h, minutes=+m)
		
			# set event name
			n = random.randint(0, 1)
			if (n == 0):
				eName = titleList[random.randint(0, len(titleList)-1)] + " EVENT"
			elif (n == 1):
				eName = nounList[random.randint(0, len(nounList)-1)] + " EVENT"
			
			# set description
			description = "This is test event " + str(i)
			
			if ([location, startTime, endTime, eName] not in eventList): 
				k = k + 1
				
		# add to list
		eventList.append([location, startTime, endTime, eName])
		
		print("INSERT INTO `event` (`eLocation`, `startTime`, `endTime`, `eName`, `description`) VALUES ('%s', '%s', '%s', '%s', '%s');" % (location, startTime, endTime, eName, description), file = fileout)
		
		# create some random register
		j = 0
		for j in range(random.randint(0, 10)):
			l = 0
			while (l < 1):
				 ID = userIDList[random.randint(0, len(userIDList)-1)]
				 if ([ID, location, startTime, endTime, eName] not in registerList):
					 l = l + 1
					 
			registerList.append([ID, location, startTime, endTime, eName])
	
			print("INSERT INTO `register` (`UserID`, `eLocation`, `startTime`, `endTime`, `eName`) VALUES (%d, '%s', '%s', '%s', '%s');" % (ID, location, startTime, endTime, eName), file = fileout)
		
	
	# close file
	fileout.close()
	
main()
