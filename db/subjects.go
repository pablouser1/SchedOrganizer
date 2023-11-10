package db

import (
	"github.com/pablouser1/SchedOrganizer/models"
	"gorm.io/gorm"
)

func commonQuery() *gorm.DB {
	return db.Preload("Group").Preload("Rooms")
}

func AddSubject(name string, url string, group int32) error {
	subject := models.Subject{
		Name:    name,
		Url:     url,
		GroupId: group,
	}

	err := db.Create(&subject).Error
	return err
}

func RemoveSubject(id int32) error {
	err := db.Delete(&models.Subject{}, id).Error
	return err
}

func GetSubject(id int32) (models.Subject, error) {
	var subject models.Subject
	err := commonQuery().First(&subject, id).Error

	return subject, err
}

func GetAllSubjects() ([]models.Subject, error) {
	var subjects []models.Subject

	err := commonQuery().Find(&subjects).Error
	return subjects, err
}
