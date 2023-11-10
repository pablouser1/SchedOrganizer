package models

type Timezone struct {
	Base
	Start  string `json:"start" gorm:"type:varchar(16)"`
	Finish string `json:"finish" gorm:"type:varchar(16)"`
}
