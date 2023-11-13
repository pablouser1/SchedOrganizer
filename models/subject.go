package models

type Subject struct {
	Base
	Name      string `json:"name" gorm:"type:varchar(32) not null"`
	ShortName string `json:"short_name" gorm:"type:varchar(16) not null"`
	Url       string `json:"url"`
	GroupId   int32  `json:"-"`
	Group     Group  `json:"group"`
	Rooms     []Room `gorm:"many2many:subjects_rooms;" json:"rooms"`
}
