package schedules

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/helpers"
)

/*
Get remaining schedules in the current weekday (if any)
*/
func GetClosest(c *gin.Context) {
	schedules, err := db.GetClosestSchedules()

	helpers.SendJSON(c, http.StatusOK, schedules, err)
}
