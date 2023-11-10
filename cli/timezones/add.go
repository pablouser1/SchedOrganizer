package timezones

import (
	"fmt"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
)

func AddMenu() {
	startPrompt := promptui.Prompt{
		Label: "Start",
		Validate: func(s string) error {
			if s == "" {
				return fmt.Errorf("empty string")
			}
			return nil
		},
	}

	start, err := startPrompt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	finishPrompt := promptui.Prompt{
		Label: "Finish",
		Validate: func(s string) error {
			if s == "" {
				return fmt.Errorf("empty string")
			}
			return nil
		},
	}

	finish, err := finishPrompt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	err = db.AddTimezone(start, finish)
	if err != nil {
		fmt.Println(err)
		return
	}
}
