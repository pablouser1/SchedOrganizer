package db

import "github.com/pablouser1/SchedOrganizer/models"

func AddGroup(year int32, group string) error {
	groupStruct := models.Group{
		Year:  year,
		Group: group,
	}

	err := db.Create(&groupStruct).Error

	return err
}

func RemoveGroup(id int32) error {
	err := db.Delete(&models.Group{}, id).Error
	return err
}

func GetAllGroups() ([]models.Group, error) {
	var groups []models.Group

	err := db.Order("year ASC").Find(&groups).Error
	return groups, err
}
