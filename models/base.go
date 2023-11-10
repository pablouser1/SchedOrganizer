package models

type Base struct {
	ID int32 `gorm:"primarykey" json:"id"`
}
