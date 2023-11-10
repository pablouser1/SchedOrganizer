package timezones

import "github.com/manifoldco/promptui"

func GetTemplate(delete bool) *promptui.SelectTemplates {
	common := "{{ .Start }} - {{ .Finish }}"

	selColor := "cyan"
	if delete {
		selColor = "red"
	}

	return &promptui.SelectTemplates{
		Label:    common,
		Active:   "\U0000261E {{ .Start | cyan }} - {{ .Finish | cyan }}",
		Inactive: common,
		Selected: "\U0000261E {{ .Start | " + selColor + " }} - {{ .Finish | " + selColor + " }}",
	}
}
