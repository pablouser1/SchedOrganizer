package models

type Group struct {
	Base
	Year  int32  `json:"year"`
	Group string `json:"group" gorm:"type:char(1)"`
}
