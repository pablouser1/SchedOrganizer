package db

import (
	"time"

	"github.com/pablouser1/SchedOrganizer/models"
)

func AddSchedule(subjectId int32, timezoneId int32, weekday int32) error {
	schedule := models.Schedule{
		SubjectId:  subjectId,
		TimezoneId: timezoneId,
		Weekday:    weekday,
	}

	err := db.Create(&schedule).Error
	return err
}

func RemoveSchedule(id int32) error {
	err := db.Delete(&models.Schedule{}, id).Error
	return err
}

func GetAllSchedules() ([]models.Schedule, error) {
	var schedules []models.Schedule
	err := db.
		InnerJoins("Timezone").
		Preload("Subject").
		Preload("Subject.Group").
		Preload("Subject.Rooms").
		Order("Timezone.start ASC").
		Find(&schedules).
		Error
	return schedules, err
}

func GetClosestSchedules() ([]models.Schedule, error) {
	now := time.Now()
	weekday := 2
	currentTime := now.Format("15:04:05")

	var schedules []models.Schedule
	err := db.
		Where("weekday = ?", weekday).
		InnerJoins("Timezone", db.Where("finish >= ?", currentTime)).
		Preload("Subject").
		Preload("Subject.Group").
		Preload("Subject.Rooms").
		Order("Timezone.start ASC").
		Find(&schedules).
		Error

	return schedules, err
}

func GetScheduleByWeekDay(weekday int32) ([]models.Schedule, error) {
	var schedules []models.Schedule
	err := db.
		InnerJoins("Timezone").
		Preload("Subject").
		Preload("Subject.Group").
		Preload("Subject.Rooms").
		Where("weekday = ?", weekday).
		Order("Timezone.start ASC").
		Find(&schedules).
		Error

	return schedules, err
}
