package models

type Schedule struct {
	Base
	SubjectId  int32    `json:"-"`
	Subject    Subject  `json:"subject"`
	Weekday    int32    `json:"weekday"`
	TimezoneId int32    `json:"-"`
	Timezone   Timezone `json:"timezone"`
}
