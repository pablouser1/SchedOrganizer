package db

import (
	"log"

	"github.com/pablouser1/SchedOrganizer/helpers"
	"github.com/pablouser1/SchedOrganizer/models"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

var db *gorm.DB

func Open() {
	host := helpers.GetEnv("DB_HOST", "localhost")
	username := helpers.GetEnv("DB_USERNAME", "")
	password := helpers.GetEnv("DB_PASSWORD", "")
	name := helpers.GetEnv("DB_NAME", "schedorganizer")

	url := username + ":" + password + "@tcp(" + host + ")/" + name + "?parseTime=true"
	var err error
	db, err = gorm.Open(mysql.Open(url), &gorm.Config{})
	if err != nil {
		log.Fatalln(err)
		return
	}

	autoMigrate()
}

func autoMigrate() {
	db.AutoMigrate(
		&models.Group{},
		&models.Room{},
		&models.Timezone{},
		&models.Subject{},
		&models.Schedule{},
	)
}
