package db

import "github.com/pablouser1/SchedOrganizer/models"

func AddRoom(location string, description string) error {
	roomStruct := models.Room{
		Location:    location,
		Description: description,
	}

	err := db.Create(&roomStruct).Error

	return err
}

func RemoveRoom(id int32) error {
	err := db.Delete(&models.Room{}, id).Error
	return err
}

func GetAllRooms() ([]models.Room, error) {
	var rooms []models.Room

	err := db.Find(&rooms).Error
	return rooms, err
}
