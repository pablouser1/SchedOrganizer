package schedules

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/helpers"
)

func GetAll(c *gin.Context) {
	schedule, err := db.GetAllSchedules()
	helpers.SendJSON(c, http.StatusOK, schedule, err)
}
