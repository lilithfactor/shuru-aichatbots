import openai
import os

#*run model using modelid and return response
def model(mid):
    #5.run model
    #read parameters
    print("\nPlease Enter the following parameters.\n")
    prefix = "You are an AI Chatbot trained on the data of Xu Jiayin's Life. Respond precisely to the next prompt."
    prompt = input('Prompt for Xu Jiayin Chatbot: ')
    t = float(input("Temperature (0-1): "))
    fp = float(input("Frequency Penalty (0-2): "))
    pp = float(input("Presence Penalty (0-2): "))
    try:
        response = openai.Completion.create(
            model= mid, #model id
            prompt=prefix+prompt+" ->", #prompt
            max_tokens=256, #max tokens
            temperature=t, #increase for random responses
            # top_p=1, #top probability
            frequency_penalty=fp, #increase for non unique responses
            presence_penalty=pp, #increase for new topics
            stop=["###"]
        )
    except Exception as err:
        print(f"Unable to Create Completion :( .\nUnexpected {err}, {type(err)}")
        raise
    else:
        print("||| Model Responding. |||")
        return response['choices'][0]['text']