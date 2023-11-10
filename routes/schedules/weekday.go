package schedules

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/helpers"
	"github.com/pablouser1/SchedOrganizer/models"
)

func GetByWeekDay(c *gin.Context) {
	weekday := c.Param("weekday")

	weekdayInt, err := strconv.ParseInt(weekday, 10, 32)

	if err != nil {
		helpers.SendJSON(c, 400, []models.Schedule{}, err, "Invalid weekday")
		return
	}

	schedules, err := db.GetScheduleByWeekDay(int32(weekdayInt))

	helpers.SendJSON(c, http.StatusOK, schedules, err)
}
