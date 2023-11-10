package helpers

import (
	"github.com/gin-gonic/gin"
	"github.com/pablouser1/SchedOrganizer/models"
)

func SendJSON(c *gin.Context, status int, data interface{}, err error, args ...string) {
	c.Header("Content-Type", "application/json")

	if err != nil {
		c.JSON(500, models.ApiRes{
			Status:  500,
			Success: false,
			Msg:     "Internal Server Error",
		})
		return
	}

	msg := "OK"
	success := status >= 200 && status < 400

	if len(args) > 0 {
		msg = args[0]
	}

	c.JSON(status, models.ApiRes{
		Status:  status,
		Success: success,
		Msg:     msg,
		Data:    data,
	})
}
