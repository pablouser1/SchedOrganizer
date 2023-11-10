package groups

import (
	"fmt"
	"strconv"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
)

func AddMenu() {
	yearPrompt := promptui.Prompt{
		Label: "Year",
		Validate: func(s string) error {
			if s == "" {
				return fmt.Errorf("empty string")
			}

			_, err := strconv.ParseInt(s, 10, 32)
			return err
		},
	}

	year, err := yearPrompt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	groupPromt := promptui.Prompt{
		Label: "Group",
	}

	group, err := groupPromt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	yearConv, err := strconv.ParseInt(year, 10, 32)
	if err != nil {
		fmt.Println(err)
		return
	}
	err = db.AddGroup(int32(yearConv), group)
	if err != nil {
		fmt.Println(err)
		return
	}
}
