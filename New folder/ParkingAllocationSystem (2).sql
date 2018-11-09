
			   /* ParkingLot Entity Set */

create table ParkingLot (
	Lot_id varchar(30),
	LotName varchar(30) unique not null,
	Address varchar(30),
	LotCapasity int,
	LotOccupied int default 0,
	NoOfBlocks int,
	constraint check (LotCapasity > 0),
	constraint check (NoOfBlocks > 0),
	constraint check (LotOccupied <= LotCapasity),
	primary key (Lot_id)
);



			    /* Floor Entity Set */

create table Floor (
	Floor_id varchar(30),
	FloorNumber	varchar(30),
	NumberOfSlot int,
	FloorOccupied int default 0,
	Lot_id varchar(30),
	constraint check (NumberOfSlot > 0),
	primary key (Floor_id),
	foreign key (Lot_id) references ParkingLot(Lot_id)
);


              /* ParkingSlot Entity Set */

create table ParkingSlot (
	SlotID varchar(30),
	ParkingType char(1),
	SlotOccupied int default 0,
	Floor_id varchar(30),
	ParkingCharges numeric(7,3) default 50.55,
	constraint check (ParkingType in ('T','F')),
	primary key (SlotID), 
	foreign key (Floor_id) references Floor(Floor_id)
);

             
              /* ParkingSlip Entity Set */

create table ParkingSlip (
	SlipID int(11),
	SlotID varchar(30),
	NetParkingCharges numeric(10,3) default 0,
	ParkingTimeStamp timestamp,
	primary key (SlipID),
	foreign key (SlotID) references ParkingSlot(SlotID)
);


            /* Customers Entity Set */

create table Customers (
	Name varchar(50),
	Email varchar(30),
	PhoneNumber varchar(11),
	SlipID int(11),
	primary key (Email),
	foreign key (Email) references Accounts(Email),
	foreign key (SlipID) references ParkingSlip(SlipID)
);


			
            /* Accounts table */
			
			
CREATE TABLE `accounts` (
  `Firstname` varchar(50),
  `Lastname` varchar(50),
  `Username` varchar(50) , 
  `Email` varchar(50),
  `Password` varchar(50),
  `phn_no` varchar(30) ,
  `Created` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(30)
)

            