package schedules

import "github.com/manifoldco/promptui"

func GetTemplate(delete bool) *promptui.SelectTemplates {
	common := "{{ .Subject.Name }} on {{ .Weekday }} at {{ .Timezone.Start }} - {{ .Timezone.Finish }}"

	selColor := "cyan"
	if delete {
		selColor = "red"
	}

	return &promptui.SelectTemplates{
		Label:    common,
		Active:   "\U0000261E {{ .Subject.Name | cyan }} on {{ .Weekday | cyan }} at {{ .Timezone.Start | cyan }} - {{ .Timezone.Finish | cyan }}",
		Inactive: common,
		Selected: "\U0000261E {{ .Subject.Name | " + selColor + " }} on {{ .Weekday | " + selColor + " }} at {{ .Timezone.Start | " + selColor + " }} - {{ .Timezone.Finish | " + selColor + " }}",
	}
}
