from PIL import Image, ImageDraw, ImageFont

# Create a blank canvas
width, height = 800, 600
canvas = Image.new("RGB", (width, height), "white")
draw = ImageDraw.Draw(canvas)

# Draw a simple street
draw.rectangle([(0, height // 2), (width, height)], fill="gray")

# Draw children walking to school
for i in range(5):
    draw.ellipse([(50 + i*150, 350), (100 + i*150, 400)], fill="blue")  # Head
    draw.rectangle([(60 + i*150, 400), (90 + i*150, 500)], fill="blue")  # Body
    draw.line([(60 + i*150, 450), (50 + i*150, 500)], fill="blue", width=5)  # Left leg
    draw.line([(90 + i*150, 450), (100 + i*150, 500)], fill="blue", width=5)  # Right leg
    draw.line([(60 + i*150, 400), (50 + i*150, 430)], fill="blue", width=5)  # Left arm
    draw.line([(90 + i*150, 400), (100 + i*150, 430)], fill="blue", width=5)  # Right arm

# Draw the AI robot dog
robot_dog_position = (300, 400)
draw.rectangle([(robot_dog_position[0], robot_dog_position[1]), (robot_dog_position[0]+60, robot_dog_position[1]+30)], fill="red")  # Body
draw.ellipse([(robot_dog_position[0]+50, robot_dog_position[1]-10), (robot_dog_position[0]+70, robot_dog_position[1]+10)], fill="red")  # Head
draw.line([(robot_dog_position[0]+10, robot_dog_position[1]+30), (robot_dog_position[0], robot_dog_position[1]+50)], fill="red", width=5)  # Left leg
draw.line([(robot_dog_position[0]+50, robot_dog_position[1]+30), (robot_dog_position[0]+60, robot_dog_position[1]+50)], fill="red", width=5)  # Right leg

# Draw a car with a cross mark to indicate illegal parking
car_position = (600, 400)
draw.rectangle([(car_position[0], car_position[1]), (car_position[0]+100, car_position[1]+50)], fill="black")  # Car body
draw.line([(car_position[0], car_position[1]), (car_position[0]+100, car_position[1]+50)], fill="red", width=5)  # Cross mark
draw.line([(car_position[0]+100, car_position[1]), (car_position[0], car_position[1]+50)], fill="red", width=5)  # Cross mark

# Draw school building
draw.rectangle([(100, 100), (200, 200)], fill="yellow")
draw.text((120, 150), "SCHOOL", fill="black")

canvas.show()
