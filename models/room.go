package models

type Room struct {
	Base
	Location    string `json:"location" gorm:"type:varchar(64)"`
	Description string `json:"description"`
}
