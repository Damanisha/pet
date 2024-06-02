# from roboflow import Roboflow
# import sys
# import json
# import cv2

# def process_image(image_path):
#     rf = Roboflow(api_key="ACbKaPR4v4WO774ojtm6")
#     project = rf.workspace().project("dog-breed-8ej59")
#     model = project.version(3).model

#     confidence_threshold = 10
#     image = cv2.imread(image_path)
#     image = cv2.resize(image, (640, 640))
#     temp_image_path = 'temp_image.jpg'
#     cv2.imwrite(temp_image_path, image)

#     result = model.predict(temp_image_path).json()

#     if 'predictions' in result and result['predictions']:
#         confidence_level = result['predictions'][0]['confidence'] * 100

#         if confidence_level < confidence_threshold:
#             return {
#                 "error": "Dog Breed is not in data set or upload a different image with the same dog breed"
#             }
#         else:
#             breed = result['predictions'][0]['top'][10:].replace('_', ' ').upper()
#             return {
#                 "breed": breed,
#                 "confidence": confidence_level
#             }
#     else:
#         return {
#             "error": "No predictions found"
#         }

# if __name__ == "__main__":
#     if len(sys.argv) < 2:
#         print(json.dumps({"error": "No image path provided"}))
#         sys.exit(1)

#     image_path = sys.argv[1]
#     result = process_image(image_path)
#     print(json.dumps(result))










#######################################################################




#VERSION 1

# from roboflow import Roboflow

# #Roboflow API
# rf = Roboflow(api_key="HhIsCEgLqGlbvxUxoj9x")
# project = rf.workspace().project("dog-breed-vmxi6")
# model = project.version(2).model

# #Result Parser
# result = model.predict("images/upload/dog_img-6-20240601.jpg").json() #Change ("") to path of image (.jpeg, .jpg, .png)

# #JSON Processor
# confidence_level = result['predictions'][0]['confidence'] * 100
# breed = result['predictions'][0]['top'][10:].replace('_', ' ').upper()

# #Result
# print(f"{breed} : {confidence_level}%")


########################################################################
# #VERSION 2

# from roboflow import Roboflow
# import cv2

# #Roboflow API
# rf = Roboflow(api_key="ACbKaPR4v4WO774ojtm6")
# project = rf.workspace().project("dog-breed-8ej59")
# model = project.version(3).model

# #Image Preprocessor
# #Change ("") to path of image (jpeg, jpg, png)
# image = cv2.imread("/xampp/htdocs/pet/images/upload/dog_img-7-20240601.jpg") 
# image = cv2.resize(image, (640, 640))
# cv2.imwrite('temp_image.jpg', image)

# #Result Parser
# result = model.predict('temp_image.jpg').json()

# #JSON Processor
# confidence_level = result['predictions'][0]['confidence'] * 100
# breed = result['predictions'][0]['top'][10:].replace('_', ' ').upper()

# #Result
# print(f"{breed} : {confidence_level}%")


#######################################################################

# #VERSION 3

from roboflow import Roboflow
import cv2

confidence_threshold = 50

#Roboflow API
rf = Roboflow(api_key="ACbKaPR4v4WO774ojtm6")
project = rf.workspace().project("dog-breed-8ej59")
model = project.version(3).model

#Image Preprocessor
image = cv2.imread("/xampp/htdocs/pet/images/3.jpg")
image = cv2.resize(image, (640, 640))
cv2.imwrite('temp_image.jpg', image)

#Result Parser
result = model.predict('temp_image.jpg').json()

#JSON Processor
confidence_level = result['predictions'][0]['confidence'] * 100

#Result
if (confidence_level < confidence_threshold):
    print("Dog Breed is not in data set or upload different image with the same dog breed")
else:
    breed = result['predictions'][0]['top'][10:].replace('_', ' ').upper()
    print(f"{breed} : {confidence_level}%")


#######################################################################

# #VERSION 4 Multiple Scan Per Run

# from roboflow import Roboflow
# import cv2

# # Roboflow API initialization
# rf = Roboflow(api_key="ACbKaPR4v4WO774ojtm6")
# project = rf.workspace().project("dog-breed-8ej59")
# model = project.version(3).model

# # List of image file paths to be processed
# image_paths = [
#     "/xampp/htdocs/pet/images/upload/dog-2-20240601_img.jpg",
#     "/xampp/htdocs/pet/images/upload/dog_img-4-20240601.jpg",
#     "/xampp/htdocs/pet/images/upload/dog_img-8-20240601.jpg"
#     # Add more image paths as needed
# ]

# confidence_threshold = 10

# def process_image(image_path):
#     # Image Preprocessor
#     image = cv2.imread(image_path)
#     image = cv2.resize(image, (640, 640))
#     temp_image_path = 'temp_image.jpg'
#     cv2.imwrite(temp_image_path, image)

#     # Result Parser
#     result = model.predict(temp_image_path).json()

#     # JSON Processor
#     if 'predictions' in result and result['predictions']:
#         confidence_level = result['predictions'][0]['confidence'] * 100

#         # Result
#         if confidence_level < confidence_threshold:
#             print(f"Image {image_path}: Dog Breed is not in data set or upload a different image with the same dog breed")
#         else:
#             breed = result['predictions'][0]['top'][10:].replace('_', ' ').upper()
#             print(f"Image {image_path}: {breed} : {confidence_level}%")
#     else:
#         print(f"Image {image_path}: No predictions found")

# # Process each image in the list
# for image_path in image_paths:
#     process_image(image_path)


#######################################################################