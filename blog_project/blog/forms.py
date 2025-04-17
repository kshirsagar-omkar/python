from django import forms
from .models import Post  # Ensure this model exists

class PostForm(forms.ModelForm):
    class Meta:
        model = Post
        fields = ['title', 'content']
