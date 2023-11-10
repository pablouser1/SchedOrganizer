package db

import "github.com/pablouser1/SchedOrganizer/models"

func AddTimezone(start string, finish string) error {
	timezone := models.Timezone{
		Start:  start,
		Finish: finish,
	}

	err := db.Create(&timezone).Error

	return err
}

func RemoveTimezone(id int32) error {
	err := db.Delete(&models.Timezone{}, id).Error
	return err
}

func GetAllTimezones() ([]models.Timezone, error) {
	var timezones []models.Timezone

	err := db.Order("start ASC").Find(&timezones).Error
	return timezones, err
}
